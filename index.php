<?php

$action = $_GET['action'];
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
}
