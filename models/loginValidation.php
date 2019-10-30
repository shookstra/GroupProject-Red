<?php
// get the input from the form
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

// array of errors
$loginErrors = [];

// strip inputs of special characters, spaces, and slashes
$email = trim($email);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = trim($password);
$password = stripslashes($password);
$password = htmlspecialchars($password);

require_once("models/user_db.php");

// email validation
if ($email === null || $email === "") {
    array_push($loginErrors, "Email cannot be empty");
}

if ($password === null || $password === "") {
    array_push($loginErrors, "Password cannot be empty");
}

if (!empty($errors)) {
    $_POST['errors'] = $loginErrors;
    include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/login.php');
} else {
    $login = user_db::login($email, $password);
    if ($login === false || $login === true) {
        array_push($loginErrors, "Incorrect Credentials.");
        include('views/login.php');
    } else {
        echo $login;
        $_SESSION['username'] = $login;
        header("Location: index.php?action=home");
    }
}

// include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/home.php');
