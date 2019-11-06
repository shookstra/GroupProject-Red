<?php

// regex for a phone number found here:
// http://phoneregex.com/
// 1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?

require_once('models/user_db.php');

// get user inputs
$firstName = filter_input(INPUT_POST, 'firstName');
$firstName = trim($firstName);
$lastName = filter_input(INPUT_POST, 'lastName');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
// array for errors
$registrationErrors = [];
$emailError = false;
$phoneError = false;
$passwordError = false;

// first and last name validation
if ($firstName === "" || $firstName === null) {
    array_push($registrationErrors, "First name cannot be empty");
}
if ($lastName === "" || $lastName === null) {
    array_push($registrationErrors, "Last name cannot be empty");
}

// phone number validation
if ($phone === "" || $phone === null) {
    array_push($registrationErrors, "Phone number cannot be empty");
    $phoneError = true;
} else if (preg_match('(1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?)', $phone) === 0) {
    array_push($registrationErrors, "Please enter a valid phone number");
    $phoneError = true;
}

// email validation
if ($email === "" || $email === null) {
    array_push($registrationErrors, "Email address cannot be empty");
    $emailError = true;
} else if (preg_match('(^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$)', $email) === 0) {
    array_push($registrationErrors, "Please enter a valid email address");
    $emailError = true;
} else {
    if (!$emailError) {
        $emailError = user_db::get_email($email);
        //if email error is true then email exists
        if (!$emailError) {
            array_push($registrationErrors, "Email already exists");
        }
    }
}

// password validation
if ($password === "" || $password === null) {
    array_push($registrationErrors, "Password cannot be empty");
} else if ($confirmPassword === "" || $confirmPassword === null) {
    array_push($registrationErrors, "Password confirmation cannot be empty");
}
if (preg_match('/^.{10,}$/', $password) === 0) {
    array_push($registrationErrors, "Password must be at least 10 characters");
}
if (preg_match('(.*[A-Z].*)', $password) === 0) {
    array_push($registrationErrors, "Password must contain at least one capital letter");
}
if (preg_match('(.*[a-z].*)', $password) === 0) {
    array_push($registrationErrors, "Password must contain at least one lower case letter");
}
if (preg_match('(.*\d.*)', $password) === 0) {
    array_push($registrationErrors, "Password must contain at least one number");
}
if ($password !== "" || $password !== null) {
    if ($password !== $confirmPassword) {
        array_push($registrationErrors, "Passwords must match");
    }
}

if (empty($registrationErrors)) {
    $options = ['cost' => 11];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    user_db::add_user($firstName, $lastName, $email, $phone, '', $hashedPassword);
    header("Location: index.php?action=home");
} else {
    include('views/signUp.php');
    exit();
}
