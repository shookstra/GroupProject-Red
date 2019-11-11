<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

$q = intval($_GET['q']);//variable from the drop down menu

$con = mysqli_connect('localhost','root','','group_project');//connection to db, copy what is in database.php
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"group_project");//where the db name goes
$sql="select tutor.tutorID, tutor.fName, tutor.lName, tutor_availability.start, tutor_availability.end, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID where subjects.subID ='".$q."'";//query for the db
$result = mysqli_query($con,$sql);

echo "<p>Each session will be 30 min</p>";
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
	$end_time = $row['end'];
	$start_time = $row['start'];
	$num_sessions = ($end_time - $start_time)*2 - 1;
       
    echo "<tr>";
    echo "<td>" . $row['fName'] . "</td>";
    echo "<td>" . $row['lName'] . "</td>";
	for($i = 0; $i <= $num_sessions; $i++){
                $times = ($start_time + (.5*$i));
                if($times >= 13){
		echo "<td>" . ($times - 12) . "</td>";
                } else {
                    echo "<td>" . $times . "</td>";
                }
	}
        $end_time = 0;
        $start_time = 0;
        $num_sessions = 0;
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
   
</body>
</html>