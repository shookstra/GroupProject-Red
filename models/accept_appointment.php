<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
    $btn = $_GET['btn'];
    $date_info = $_GET['test'];
    
    $tutor_info = explode(",",$btn);
    $tutor_info_ID = $tutor_info[0];//tutor ID
    $tutor_info_time = $tutor_info[1];//time selected
    $tutor_info_fName = $tutor_info[2];//tutor first name
    
    $jsInformation2 = explode(",", $date_info);
    $date_info_day = $jsInformation2[0];//day of week
    $date_info_month = $jsInformation2[1];//month clicked
    $date_info_date = $jsInformation2[2];//date clicked
    
    echo "<ul>";
    echo "<li>Appointment Month: ". $date_info_month ."</li>";
    echo "<li>Appointment Day: " . $date_info_date ."</li>";
    echo "<li>Tutor: " . $tutor_info_fName ."</li>";
    echo "<li>Time: " . $tutor_info_time ."</li>";
    echo "</ul>";

?>
</body>
</html>
   
</body>
</html>