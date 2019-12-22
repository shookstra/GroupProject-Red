<?php

if (!empty($userToPromote)) {
    user_db::update_role($userToPromote->getUserID(), "Admin");
    header("Location: index.php?action=home");
} else { }

