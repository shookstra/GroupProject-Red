<?php

require_once("subject_db.php");
require_once("subject.php");
require_once("tutor_db.php");
require_once("tutor_availability.php");

$subjects = subject_db::select_all();
$tutor_available = tutor_db::get_tutors_by_availability();

