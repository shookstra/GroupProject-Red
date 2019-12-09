<?php

require_once('models/user.php');
require_once('models/user_db.php');
require_once('models/appointment.php');
require_once('models/appointment_db.php');
require_once('models/tutor.php');
require_once('models/tutor_db.php');
require_once('models/subject_db.php');
require_once('models/subject.php');
require_once('models/tutor_availability.php');

session_start();

$action = '';

if (!empty($_POST['action'])) {
    $action = $_POST['action'];
} else if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else if (empty($_SESSION['user'])) {
    $action = 'login';
}

switch ($action) {
    case 'home':
        if (empty($_SESSION['user'])) {
            $registrationErrors = [];
            array_push($registrationErrors, "You need to sign in to access scheduling");
            include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/login.php');
        } else {
            $today = date("Y-m-d");
            $subjects = subject_db::select_all();
            $tutor_available = tutor_db::get_tutors_by_availability();
            $tutors = tutor_db::select_all_Tutors();
            $stuApps = appointment_db::get_student_Appointments($_SESSION['user']->getUserID());
            $users = user_db::select_all();
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
    case 'cancelAppointment':
        $appointmentID = filter_input(INPUT_POST, "appointmentID");
        appointment_db::deleteAppointment($appointmentID, $_SESSION['user']->getUserID());
        header("Location: index.php?action=home");
        die();
        break;
    case 'viewTutorProfile':
        $tutor = tutor_db::get_tutor_by_id(filter_input(INPUT_GET, 'tutorID'));
        $availability = tutor_db::get_tutor_availablity_by_ID($tutor->getTutorID());
        $subjects = tutor_db::getSubjects($tutor->getTutorID());
        include 'views/tutorProfile.php';
        die();
        break;
    case 'add_holiday':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/dates_between_functions.php');
        die();
        break;
    case 'addTutorValidation':
        $userToPromote = user_db::get_user_by_id($_REQUEST['selectedUser']);
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/addTutorValidation.php');
        die();
        break;
    case 'deleteTutor':
        $tutorID = $_REQUEST['selectedTutor'];
        tutor_db::deleteTutor($tutorID);
        tutor_db::deleteTutor_Availability($tutorID);
        user_db::update_role($tutorID, 'Student');
        header("Location: index.php?action=home");
        die();
        break;
    case 'profile':
        include('views/profile.php');
        die();
        break;
    case 'ChangeMyInformation':
        // $_SESSION['user'] = user_db::get_specificUser($email);
        include('views/updateProfile.php');
        die();
        break;
    case 'updateValidation':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/updateValidation.php');
        $_SESSION['user'] = user_db::get_specificUser($email);
        die();
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php?action=home');
        die();
        break;
}
