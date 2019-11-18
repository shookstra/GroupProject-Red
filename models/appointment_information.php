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
   
   switch($appoint_info_date_month) {
       case 'January':
           $appointment_month = 1;
           die();
           break;
       
       case "February":
           $appointment_month = 2;
           die();
           break;
       
       case 'March':
           $appointment_month = 3;
           die();
           break;
       
       case 'April':
           $appointment_month = 4;
           die();
           break;
       
       case 'May':
           $appointment_month = 5;
           die();
           break;
       
       case 'June':
           $appointment_month = 6;
           die();
           break;
       
       case 'July':
           $appointment_month = 7;
           die();
           break;
       
       case "August":
           $appointment_month = 8;
           die();
           break;
       
       case 'September':
           $appointment_month = 9;
           die();
           break;
       
       case 'October':
           $appointment_month = 10;
           die();
           break;
       
       case 'November':
           $appointment_month = 11;
           die();
           break;
       
       case 'December':
           $appointment_month = 12;
           die();
           break;
       

   }
   
   echo "<ul>";
    echo "<li>Appointment Month: ". $appoint_info_date_month ."</li>";
    echo "<li>Appointment Day: " . $appoint_info_date ."</li>";
    echo "<li>Tutor: " . $appoint_info_fName ."</li>";
    echo "<li>Time: " . $appoint_info_time ."</li>";
    echo "<li>Details: " . $details . "</li>";
    echo "<li>Meeting Type: " . $meetType . "</li>";
    echo "<li>User ID: " . $appoint_info_userID . "</li><br>"; 
    echo "</ul>";
    
    echo "<button type='submit' value=" . $appoint_info_subID . "," . $appoint_info_userID . "," . $appoint_info_tutorID . "," .$appoint_info_year . $appointment_month . $appoint_info_date . "," . $appoint_info_time . "," . $details . "," . $meetType . " onclick='submit_appointment(this.value)' >Accept</button>"
?>
</body>
</html>
