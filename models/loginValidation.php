<?php
// get the input from the form
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

// strip inputs of special characters, spaces, and slashes
$email = trim($email);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = trim($password);
$password = stripslashes($password);
$password = htmlspecialchars($password);

// array of errors
$errors = [];

if ($email === null || $email === "") {
    array_push($errors, "Email cannot be empty");
} else if (preg_match) { }

if (empty($password === null || $password === "")) {
    array_push($errors, "Password cannot be empty");
}


if (!empty($errors)) {
    $_POST['errors'] = $errors;
    include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/login.php');
}
// echo $errors;

// include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/home.php');
