<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    require_once('../models/database.php');
    require_once('../models/appointment_db.php');

    $q = $_GET['q']; //subject ID
    $testDay = $_GET['test'];

    $subID_UserID = explode(",", $q);
    $subID = $subID_UserID[0];
    $userID = $subID_UserID[1];

    $jsInformation = explode(",", $testDay);
    $dayPulled = $jsInformation[0]; //day of week
    $monthPulled = $jsInformation[1]; //month clicked
    $datePulled = $jsInformation[2]; //date clicked
    $yearPulled = $jsInformation[3]; //year clicked



    $appDate = "$yearPulled" . '-' . "$monthPulled" . '-' . "$datePulled";
    $con = mysqli_connect('localhost', 'root', '', 'group_project'); //connection to db, copy what is in database.php
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "groupproject"); //where the db name goes
    $sql = "select tutor.tutorID, tutor.fName, tutor.lName, tutor.city, tutor_availability.start, tutor_availability.end, tutor_availability.hours, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID where tutor_availability.day ='" . $dayPulled . "' && subjects.subID ='" . $subID . "'"; //query for the db to pull tutor availability for each tutor
    $result = mysqli_query($con, $sql); //query result
    $rowcount = mysqli_num_rows($result); //number of values in the query



    if ($rowcount == 0) {
        echo "<p> Sorry no tutors available </p>";
    } else {
        echo "<center><p>Each session will be 30 min</p></center>";
        echo "<center><strong><p>*Make sure to pay attention to the tutors city. You can schedule a ZOOM meeting for a tutor in another city, but an in person meeting will have to be in your cities tutoring center.</p></strong></center>";
        echo "<table>
<tr>
<th>First</th>
<th>Last</th>
<th>City</th>

</tr>";

        $appTime = [];
        $tutor_test = [];

        while ($row = mysqli_fetch_array($result)) {

            $end_time = $row['end'];
            $start_time = $row['start'];
            $num_sessions = $row['hours'] * 2 - 1;
            $tutor_fname = $row['fName'];
            $tutorID = $row['tutorID'];
            //$check_times = appointment_db::get_tutor_times($tutorID, $appDate);
            //$tutorInfo = appointment_db::get_tutor_Times($tutorID, $appDate);
            $tutorInfo = array('tutorID' => $tutorID, 'appTime' => appointment_db::get_tutor_Times($tutorID, $appDate));
            array_push($appTime, $tutorInfo);

            $running_tutor = array_column($appTime, 'tutorID');
            $running_appTime = array_column($appTime, 'appTime', 'tutorID');


            echo "<tr>";
            echo "<td>" . $row['fName'] . "</td>";
            echo "<td>" . $row['lName'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            for ($i = 0; $i <= $num_sessions; $i++) {


                $print_time_normal = date("g:i", strtotime($start_time) + ((60 * 30) * $i));
                $print_time_military = date("H:i:s", strtotime($start_time) + ((60 * 30) * $i));



                if (!empty($appTime)) { //checks if the $testing variable has anything in it

                    if (in_array($tutorID, $running_tutor)) {

                        if (!in_array($print_time_military, $running_appTime[$tutorID])) {

                            echo "<td><button type = 'submit' value = " . $subID . "," . $userID . "," . $tutorID . "," . $print_time_military . "," . $tutor_fname . " onclick='showAppointment(this.value)'>" . $print_time_normal . "</button></td>";
                        } else {
                            echo "<td><button disabled>" . $print_time_normal . "</button>";
                        }
                    } else {
                        echo "<td><button type = 'submit' value = " . $subID . "," . $userID . "," . $tutorID . "," . $print_time_military . "," . $tutor_fname . " onclick='showAppointment(this.value)'>" . $print_time_normal . "</button></td>";
                    }
                } else {
                    echo "<td><button type = 'submit' value = " . $subID . "," . $userID . "," . $tutorID . "," . $print_time_military . "," . $tutor_fname . " onclick='showAppointment(this.value)'>" . $print_time_normal . "</button></td>";
                }
            }
            echo "</tr>";
        }
        var_dump($running_appTime);
    }
    echo "</table>";


    mysqli_close($con);
    ?>
</body>

</html>