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

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Day</th>
<th>Start</th>
<th>End</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['fName'] . "</td>";
    echo "<td>" . $row['lName'] . "</td>";
    echo "<td>" . $row['day'] . "</td>";
    echo "<td>" . $row['start'] . "</td>";
    echo "<td>" . $row['end'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
   
</body>
</html>