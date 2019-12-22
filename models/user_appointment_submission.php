<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    $appointment = $_GET['appointment'];

    $appoint_info = explode(",", $appointment);
    
    $appoint_time = $appoint_info[6]; //time
    

    $subID = filter_var($appoint_info[0], FILTER_SANITIZE_NUMBER_INT);
    $userID = filter_var($appoint_info[1], FILTER_SANITIZE_NUMBER_INT);
    $tutorID = filter_var($appoint_info[2], FILTER_SANITIZE_NUMBER_INT);
    $yearPulled = filter_var($appoint_info[3], FILTER_SANITIZE_NUMBER_INT);
    $monthPulled = filter_var($appoint_info[4], FILTER_SANITIZE_NUMBER_INT);
    $datePulled = filter_var($appoint_info[5], FILTER_SANITIZE_NUMBER_INT);
    $details = filter_var($appoint_info[7], FILTER_SANITIZE_STRING);
    $meetType = filter_var($appoint_info[8], FILTER_SANITIZE_STRING);
    

   

    $appDate = "$yearPulled" . '-' . "$monthPulled" . '-' . "$datePulled";


    $con = mysqli_connect('localhost', 'root', '', 'group_project'); //connection to db, copy what is in database.php
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "groupproject"); //where the db name goes
    $sql = "INSERT into appointment (subID, userID, tutorID, appDate, appTime, details, meetType)
         VALUES
         ('$subID', '$userID', '$tutorID', '$appDate', '$appoint_time', '$details', '$meetType')";

    $result = mysqli_query($con, $sql); //query result

    if ($result) {

        echo "<center><p>Appointment Scheduled!</p></center>";
    }



    mysqli_close($con);
    ?>
</body>

</html>