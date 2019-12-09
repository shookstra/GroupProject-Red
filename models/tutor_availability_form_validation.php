<?php

$userID = $_SESSION['user']->getUserId();

$day = filter_input(INPUT_POST, 'day');
$start = $_POST['start_time'];
$end = $_POST['end_time'];

if (!empty($start)) {
    if (!empty($end)) {
        tutor_db::add_tutor_availability($userID, $day, $start, $end, 0);
        $_SESSION['time_error'] = '';
        header('Location: index.php?action=home');
    } else {
        $_SESSION['time_error'] = '****** Please enter an end time ******';
        header('Location: index.php?action=home');
    }
} else {
    $_SESSION['time_error'] = '****** Please select a start time ******';
    header('Location: index.php?action=home');
}



header('Location: index.php?action=home');

