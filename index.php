<?php

require_once('models/user.php');
require_once('models/user_db.php');
require_once('models/appointment_db.php');

session_start();

$action = '';

if (!empty($_POST['action'])) {
    $action = $_POST['action'];
} else if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else if (empty($_SESSION['user'])) {
    $action = 'signUp';
}

switch ($action) {
    case 'home':
        if (empty($_SESSION['user'])) {
            $registrationErrors = [];
            array_push($registrationErrors, "You need to sign in to access scheduling");
            include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/signUp.php');
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/home.php');
        }
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
        $_SESSION['user'] = user_db::get_specificUser($email);
        die();
        break;
    case 'registrationValidation':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/registrationValidation.php');
        $_SESSION['user'] = user_db::get_specificUser($email);
        die();
        break;
    case 'calendar':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/tutor_selection.php');
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/calendar.php');
        die();
        break;
    case '':

        include '';
        die();
        break;
    case 'profile':
        $stuApps = appointment_db::get_student_Appointments($_SESSION['user']->getUserID());
        // tutor app call may not go here ?
        //$tutorApps = appointment_db::get_tutor_Appointments($tutorID);
        include('views/profile.php');
        die();
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php?action=home');
        die();
        break;
}
