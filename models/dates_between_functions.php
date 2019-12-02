<?php


// Function to get all the dates in given range 
function getDatesFromRange($start, $end, $format = 'Y-m-d')
{

    // Declare an empty array 
    $array = array();

    // Variable that store the date interval 
    // of period 1 day 
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    // Use loop to store date into array 
    foreach ($period as $date) {
        $array[] = $date->format($format);
    }

    // Return the array elements 
    return $array;
}

// Function call with passing the start date and end date 
//$Date = getDatesFromRange('2010-10-01', '2010-10-05'); 

$start = $_POST['start_date'];
$end = $_POST['end_date'];
$holiday_name = 'Closed0001';

if (!empty($end)) {
    $date_range = getDatesFromRange($start, $end);
} else {
    appointment_db::add_holiday($holiday_name, $start);
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']; ?> /GroupProject/styling/calendarStyle.css">
</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/models/tutor_selection.php');
include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php')
?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <?php
        if (!empty($date_range)) {
            foreach ($date_range as $value) {
                appointment_db::add_holiday($holiday_name, $value);
                ++$holiday_name;
            }

            echo "<script>alert('Dates added!');</script>";

            ?>alert(Dates added);<?php
                                    } else {
                                        ?><p>Dates not added, please check syntax and re-enter</p><?php
                                                                                                    }
                                                                                                    ?>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /groupProject/calendar.js"></script>
    </div>
</body>

</html>