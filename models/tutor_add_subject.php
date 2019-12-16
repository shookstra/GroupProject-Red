<?php

$userID = $_SESSION['user']->getUserId();

$subject = filter_input(INPUT_POST, 'subjects');

if(!empty($subject)) {
    subject_db::add_tutor_Subject($subject, $userID);
    $_SESSION['subject_error'] = '';
        header('Location: index.php?action=home');
} else {
    $_SESSION['subject_error'] = '*** Select a Subject ***';
        header('Location: index.php?action=home');
}


header('Location: index.php?action=home');
