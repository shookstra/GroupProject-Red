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
$holiday_name = 'Tutor Center Closed0001';

    if(!empty($start)){
    if(!empty($end)){
        $date_range = getDatesFromRange($start, $end);
        if(!empty($date_range)){
            foreach($date_range as $value){
                appointment_db::add_holiday($holiday_name, $value);
                ++$holiday_name;
        }
            $_SESSION['date_range_error'] = '';
            header('Location: index.php?action=home');

        } else {
            $_SESSION['date_range_error'] = '';
            header('Location: index.php?action=home');
        }
    } else {
        $_SESSION['date_range_error'] = '';
        appointment_db::add_holiday($holiday_name, $start);
        header('Location: index.php?action=home');
    }
    } else {
        $_SESSION['date_range_error'] = 'Please select a start date';
        header('Location: index.php?action=home');
       
    }
    
    