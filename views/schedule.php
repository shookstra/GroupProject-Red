<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = $_GET['q'];//subject ID
$testDay = $_GET['test'];

$subID_UserID = explode(",", $q);
$subID = $subID_UserID[0];
$userID = $subID_UserID[1];

$jsInformation = explode(",",$testDay);
$dayPulled = $jsInformation[0];//day of week
$monthPulled = $jsInformation[1];//month clicked
$datePulled = $jsInformation[2];//date clicked

$con = mysqli_connect('localhost','root','','group_project');//connection to db, copy what is in database.php
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"group_project");//where the db name goes
$sql="select tutor.tutorID, tutor.fName, tutor.lName, tutor.city, tutor_availability.start, tutor_availability.end, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID where tutor_availability.day ='".$dayPulled."' && subjects.subID ='".$subID."'";//query for the db
$result = mysqli_query($con,$sql);//query result
$rowcount=mysqli_num_rows($result);//number of values in the query

if($rowcount == 0){
    echo "<p> Sorry no tutors available </p>";
    
} else {
echo "<center><p>Each session will be 30 min</p></center>";
echo "<center><strong><p>*Make sure to pay attention to the tutors city. You can schedule a zoom meeting for a tutor in another city, but an in person meeting will have to be in your cities tutoring center.</p></strong></center>";
echo "<table>
<tr>
<th>First</th>
<th>Last</th>
<th>City</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
	$end_time = $row['end'];
	$start_time = $row['start'];
	$num_sessions = ($end_time - $start_time)*2 - 1;
        $tutor_fname = $row['fName'];
        $tutorID = $row['tutorID'];
       
    echo "<tr>";
    echo "<td>" . $row['fName'] . "</td>";
    echo "<td>" . $row['lName'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
	for($i = 0; $i <= $num_sessions; $i++){
                $times = ($start_time + (.5*$i));
                if($times >= 13){
				$timeStr = $times - 12;
                } else {
				$timeStr = $times;
                }
				
		if(strpos($timeStr, ".") !== false){
                    $timePrint = intval($timeStr) . ":30";
                    echo "<td><button type = 'submit' value = " . $subID . "," . $userID . "," . $tutorID . "," . $timePrint . "," . $tutor_fname ." onclick='showAppointment(this.value)'>". $timePrint . "</button></td>";
		} else {
                    echo "<td><button type = 'submit' value = " . $subID . "," . $userID . "," . $tutorID . "," . $timeStr . "," . $tutor_fname ." onclick='showAppointment(this.value)'>". $timeStr . "</button></td>";
		}
	}
        $end_time = 0;
        $start_time = 0;
        $num_sessions = 0;
        $timeStr = 0;
        $timePrint = "";
    
    echo "</tr>";
}
echo "</table>";
}
mysqli_close($con);
?>
</body>
</html>
   
</body>
</html>