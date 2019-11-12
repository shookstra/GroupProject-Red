<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);//subject ID
$testDay = $_GET['test'];

$jsInformation = explode(",",$testDay);
$dayPulled = $jsInformation[0];//day of week
$monthPulled = $jsInformation[1];//month clicked
$datePulled = $jsInformation[2];//date clicked

$con = mysqli_connect('localhost','root','','group_project');//connection to db, copy what is in database.php
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"group_project");//where the db name goes
$sql="select tutor.tutorID, tutor.fName, tutor.lName, tutor_availability.start, tutor_availability.end, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID where tutor_availability.day ='".$dayPulled."' && subjects.subID ='".$q."'";//query for the db
$result = mysqli_query($con,$sql);
if('mysqli_num_rows' == 0){
    echo "<p> Sorry no tutors available </p>";
    
} else {
echo "<p>Each session will be 30 min</p>";
echo "<table>
<tr>
<th>First</th>
<th>Last</th>

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
    echo "<td>" . $row['day'] . "</td>";
	for($i = 0; $i <= $num_sessions; $i++){
                $times = ($start_time + (.5*$i));
                if($times >= 13){
				$timeStr = $times - 12;
                } else {
				$timeStr = $times;
                }
				
		if(strpos($timeStr, ".") !== false){
                    $timePrint = intval($timeStr) . ":30";
                    echo "<td><button type = 'submit' value = " . $q . "," . $tutorID . "," . $timePrint . "," . $tutor_fname ." onclick='showAppointment(this.value)'>". $timePrint . "</button></td>";
		} else {
                    echo "<td><button type = 'submit' value = " . $q . "," . $tutorID . "," . $timeStr . "," . $tutor_fname ." onclick='showAppointment(this.value)'>". $timeStr . "</button></td>";
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