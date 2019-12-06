<?php

if (!empty($userToPromote)) {
    tutor_db::add_Tutor($userToPromote->getUserID(), $userToPromote->getFName(), $userToPromote->getLName(), $userToPromote->getEmail(), $userToPromote->getPhone(), $_REQUEST['city']);
    user_db::update_role($userToPromote->getUserID(), "Tutor");
    header("Location: index.php?action=home");
} else { }
