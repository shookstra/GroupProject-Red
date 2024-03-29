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
            $tutor_apps = appointment_db::get_tutor_Appointments($_SESSION['user']->getUserID());
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
        $days_for_sub = tutor_db::select_distinct_subject_days();
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
    
    case 'additional_subject':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/adding_subjects.php');
        die();
        break;
    
    case 'print_unique_users':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/report_functions.php');
        Unique_user_information_report();
        die();
        break;
    case 'todays_appointments':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/report_functions.php');
        daily_appointment_information_report();
        die();
        break;
    case 'weeks_appointments':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/report_functions.php');
        week_appointment_information_report();
        die();
        break;
    case 'reminder_email':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/report_functions.php');
        reminder_email();
        die();
        break;
    
    case 'changeAvailability':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/tutor_availability_form_validation.php');
        die();
        break;
    
    case 'removeAvailability':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/remove_availability.php');
        die();
        break;
    
    case 'add_subject':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/tutor_add_subject.php');
        die();
        break;

    case 'addTutorValidation':
        $userToPromote = user_db::get_user_by_id($_REQUEST['selectedUser']);
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/addTutorValidation.php');
        die();
        break;
    
    case 'addAdminValidation':
        $userToPromote = user_db::get_user_by_id($_REQUEST['selectedUser']);
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/add_admin_validation.php');
        die();
        break;
    
     case 'remove_admin':
        $userToDemote = user_db::get_user_by_id($_REQUEST['selectedAdmin']);
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/remove_admin.php');
        die();
        break;
    
    case 'deleteTutor':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/deleteTutor.php');
        die();
        break;
    case 'profile':
        include('views/profile.php');
        die();
        break;
    case 'ChangeMyInformation':
        $firstName = $_SESSION['user']->getFName();
        $lastName = $_SESSION['user']->getLName();
        $phone = $_SESSION['user']->getPhone();
        // $_SESSION['user'] = user_db::get_specificUser($email);
        include('views/updateProfile.php');
        die();
        break;
    case 'updateValidation':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/updateValidation.php');
        $_SESSION['user'] = user_db::get_specificUser($_SESSION['user']->getEmail());
        die();
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php?action=home');
        die();
        break;
}
