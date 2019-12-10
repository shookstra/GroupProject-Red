<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tutor Availability</title>
</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/tutor_selection.php');
include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php')
?>

<body>
	<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php'); ?>
        
            <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_conference">
                    
                    <ul class="form-wrapper">
                   
                    <label>Monday:</label>
                    <label for="appt">Start Time:</label>
                        <input type="time" id="appt" name="mon_start_time" accept="" min="10:00" max="18:30" required>
                    <label for="appt">End Time:</label>
                        <input type="time" id="appt" name="mon_end_time" accept="" min="10:30" max="19:00" required>

                    <label>Tuesday:</label>
                    <label for="appt">Start Time:</label>
                        <input type="time" id="appt" name="tue_start_time" accept="" min="10:00" max="18:30" required>
                    <label for="appt">End Time:</label>
                        <input type="time" id="appt" name="tue_end_time" accept="" min="10:30" max="19:00" required>
                        
                    <label>Wednesday:</label>
                    <label for="appt">Start Time:</label>
                        <input type="time" id="appt" name="wed_start_time" accept="" min="10:00" max="18:30" required>
                    <label for="appt">End Time:</label>
                        <input type="time" id="appt" name="wed_end_time" accept="" min="10:30" max="19:00" required>
                        
                    <label>Thursday:</label>
                    <label for="appt">Start Time:</label>
                        <input type="time" id="appt" name="thu_start_time" accept="" min="10:00" max="18:30" required>
                    <label for="appt">End Time:</label>
                        <input type="time" id="appt" name="thu_end_time" accept="" min="10:30" max="19:00" required>
                        
                    <label>Friday:</label>
                    <label for="appt">Start Time:</label>
                        <input type="time" id="appt" name="fri_start_time" accept="" min="10:00" max="18:30" required>
                    <label for="appt">End Time:</label>
                        <input type="time" id="appt" name="fri_end_time" accept="" min="10:30" max="19:00" required>
                    
                    </ul>
                </form>

    </body>
</html>
