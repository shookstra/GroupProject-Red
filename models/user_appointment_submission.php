<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$appointment = $_GET['appointment'];

$appoint_info = explode(",", $appointment);
$subID = $appoint_info[0];
$userID = $appoint_info[1];
$tutorID = $appoint_info[2];
$yearPulled = $appoint_info[3];
$monthPulled = $appoint_info[4];
$datePulled = $appoint_info[5];
$appoint_time = $appoint_info[6];
$details = $appoint_info[7];
$meetType = $appoint_info[8];





$appDate = "$yearPulled".'-'."$monthPulled".'-'."$datePulled";
$con = mysqli_connect('localhost','root','','groupproject');//connection to db, copy what is in database.php
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"groupproject");//where the db name goes
$sql="INSERT into appointment (subID, userID, tutorID, appDate, appTime, details, meetType)
         VALUES
         ('$subID', '$userID', '$tutorID', '$appDate', '$appoint_time', '$details', '$meetType')";

$result = mysqli_query($con, $sql);//query result
    var_dump($subID);
    var_dump($userID);
    var_dump($tutorID);
    var_dump($appDate);
    var_dump($appoint_time);
    var_dump($details);
    var_dump($meetType);
if($result){
    
    echo"<center><p>Appointment Scheduled!</p></center>";
}



mysqli_close($con);
?>
</body>
</html>
   
</body>
</html>


