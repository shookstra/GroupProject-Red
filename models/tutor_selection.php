<?php

require_once("subject_db.php");
require_once("subject.php");

$subjects = subject_db::select_all();

