<?php

$action = '';

if (!empty($_POST['action'])) {
    $action = $_POST['action'];
} else if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

// $action = '';

switch ($action) {
    case 'home':
        include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/home.php');
        die();
        break;
    case 'login':
        include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/login.php');
        die();
        break;
    case 'signUp':
        include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/signUp.php');
        die();
        break;
    case 'loginValidation':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/loginValidation.php');
        die();
        break;
}
