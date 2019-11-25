<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    //$dow = filter_input(INPUT_GET, );//variable from the drop down menu
    $a = mb_substr($dow, 0, 2);
    $con = mysqli_connect('localhost', 'root', '', 'groupproject'); //connection to db, copy what is in database.php
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "groupproject"); //where the db name goes
    $sql = "select subjects.subID, subjects.subName
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID where tutor_availability.day ='" . $a . "'"; //query for the db
    $result = mysqli_query($con, $sql);


    echo "<form action='index.php' method='post'>
    <select id='jsname' onchange='showUser(this.value)' autofocus>
    <option value=''>Select a subject:</option>";
    while ($row = mysqli_fetch_array($result)) {
        $subID = $row['subID'];
        $subName = row['subName'];
        echo "<option value='$subID'><'$subName'></option>";
        echo "</select>
        </form>";
    }

    mysqli_close($con);
    ?>
</body>

</html>

</body>

</html>