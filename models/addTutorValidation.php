<?php

$all_tutors = tutor_db::select_all();
$promoting_user = $userToPromote->getUserID();
var_dump($all_tutors);
var_dump($promoting_user);
if (!empty($userToPromote)) {
    if(in_array($promoting_user, $all_tutors)){
        tutor_db::set_Tutor_activity($userToPromote->getUserID(), 1);
        user_db::update_role($userToPromote->getUserID(), "Tutor");
        header("Location: index.php?action=home");
        
    } else { 
        
        $active = 1;
        tutor_db::add_Tutor($userToPromote->getUserID(), $userToPromote->getFName(), $userToPromote->getLName(), $userToPromote->getEmail(), $userToPromote->getPhone(), $_REQUEST['city'], 1);
        user_db::update_role($userToPromote->getUserID(), "Tutor");
        header("Location: index.php?action=home");
    }
}
