<?php

$userID = $_SESSION['user']->getUserId();

$removal_day = filter_input(INPUT_POST, 'removal_day');

if (!empty($removal_day)) {
   
        tutor_db::deleteTutor_Availability_with_day($userID, $removal_day);
        
        header('Location: index.php?action=home');  
} 

header('Location: index.php?action=home');