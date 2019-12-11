<?php

if (!empty($userToDemote)) {
    user_db::update_role($userToDemote->getUserID(), "Student");
    header("Location: index.php?action=home");
} else { }

