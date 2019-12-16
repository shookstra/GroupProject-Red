<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
   $send = $_GET['send'];
   $details = $_GET['details'];
   $meetType = $_GET['meetType'];
   
   $appoint_info = explode(",",$send);
   $appoint_info_subID = $appoint_info[0];
   $appoint_info_userID = $appoint_info[1];
   $appoint_info_tutorID = $appoint_info[2];
   $appoint_info_date_month = $appoint_info[3];
   $appoint_info_date = $appoint_info[4];
   $appoint_info_time = $appoint_info[5];
   $appoint_info_fName = $appoint_info[6];
   $appoint_info_year = $appoint_info[7];
   

   
    echo "<ul>";
    echo "<li>Appointment Month: ". $appoint_info_date_month ."</li>";
    echo "<li>Appointment Day: " . $appoint_info_date ."</li>";
    echo "<li>Tutor: " . $appoint_info_fName ."</li>";
    echo "<li>Time: " . $appoint_info_time ."</li>";
    echo "<li>Details: " . ucfirst($details) . "</li>";
    echo "<li>Meeting Type: " . ucfirst($meetType) . "</li>";
    echo "<li>User ID: " . $appoint_info_userID . "</li><br>";
    echo "</ul>";
    
    echo "<button type='submit' value=" . $appoint_info_subID . "," . $appoint_info_userID . "," . $appoint_info_tutorID . "," .$appoint_info_year . "," . $appoint_info_date_month . "," . $appoint_info_date . "," . $appoint_info_time . "," . $details . "," . $meetType . " onclick='submit_appointment(this.value)' >Accept</button>"
?>
</body>
</html>
