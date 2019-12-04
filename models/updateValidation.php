<?php


require_once('models/user_db.php');

// get user inputs
$firstName = filter_input(INPUT_POST, 'firstName');
$firstName = trim($firstName);
$lastName = filter_input(INPUT_POST, 'lastName');
$phone = filter_input(INPUT_POST, 'phone');

// array for errors
$registrationErrors = [];
$phoneError = false;


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

if (empty($registrationErrors)) {
    user_db::update_User($firstName, $lastName, $phone);
    header("Location: index.php?action=profile");
} else {
    include('views/updateProfile.php');
    exit();
}