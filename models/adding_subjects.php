<?php


$subject_name = filter_input(INPUT_POST, 'subject_to_add');

if(!empty($subject_name)) {
    subject_db::add_Subject($subject_name);
    $_SESSION['subject_add_error'] = '';
        header('Location: index.php?action=home');
} else {
    $_SESSION['subject_add_error'] = '*** ENTER a Subject ***';
        header('Location: index.php?action=home');
}


header('Location: index.php?action=home');

