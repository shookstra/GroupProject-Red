<?php

$userID = $_SESSION['user']->getUserId();

$day = filter_input(INPUT_POST, 'day');
$start = $_POST['start_time'];
$end = $_POST['end_time'];

$hours = date("H:i:s", strtotime($end)) - date("H:i:s", strtotime($start));

if (!empty($start)) {
    if (!empty($end) && (strtotime($end) > strtotime($start))) {
        tutor_db::add_tutor_availability($userID, $day, $start, $end, $hours);
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

