<?php

require_once('models/user.php');

session_start();

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
    case 'registrationValidation':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/registrationValidation.php');
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
    case '':
        
        include '';
        die();
        break;
    case 'profile':
        $email = $_SESSION['email'];
        $role = user_db::get_roleType($email);
        $_SESSION['role'] = $role;
        $user = user_db::get_specificUser($email);
        $stuApps = appointment_db::get_student_Appointments($userID);
        //tutor app call may not go here ?
        $tuterApps = appointment_db::get_tutor_Appointments($tutorID);
        include('view/profile.php');
        die();
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php?action=home');
        die();
        break;
}
