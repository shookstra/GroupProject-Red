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
    



function Unique_user_information_report(){
    
        $users = user_db::selectAll();
        $unique_users = array();

        $fields = array('user_email', 'first_name', 'last_name'); 

        $unique_users[] = $fields;
        $old_users = array();
        
        if(!in_array($unique_users, $old_users)) {
                foreach($users as $user){
                    $values=array();

                    $values[] = $user->getEmail();
                    $values[] = $user->getFName();
                    $values[] = $user->getLName();
                    $unique_users[] = $values;
                    $old_users[] += $unique_users[];
            }
        }

                $content_comma_seperated = '';
                $sep = ",";

    foreach ($unique_users as $values) {
        $content_comma_seperated .= implode($sep, $values);
        $content_comma_seperated .= "\n"; // add separator between sub-arrays

    }
                $length = strlen($content_comma_seperated);
                header('Content-Description: File Transfer');
                header('Content-Type: text/plain');//<<<<
                header('Content-Disposition: attachment; filename=unique_users.csv');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . $length);
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                header('Pragma: public');
                echo $content_comma_seperated;// writes the contents to the file
                die();

}

               

function No_show_user_information_report(){
    
                //$users = db call;Add a table for tutors to add no shows
                $noshow_users = array();

                $fields = array('user_email', 'first_name', 'last_name', 'numer_of_noshows');
                $noshow_users[] = $fields;
                
                foreach($users as $user){

                    $values=array();
                    $values[] = $user->getEmail();
                    $values[] = $user->getFName();
                    $values[] = $user->getLName();
                    $values[] = $user->getNoShow();
                    $noshow_users[] = $values;

    }

                $content_comma_seperated = '';
                $sep = ",";

                foreach ($noshow_users as $values) {    
                    $content_comma_seperated .= implode($sep, $values); 
                    $content_comma_seperated .= "\n"; // add separator between sub-arrays

    }
                $length = strlen($content_comma_seperated);
                
                header('Content-Description: File Transfer');
                header('Content-Type: text/plain');//<<<<
                header('Content-Disposition: attachment; filename=noShow_users.csv');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . $length);
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                header('Pragma: public');

                echo $content_comma_seperated;// writes the contents to the file
                die();

}

 

function daily_appointment_information_report(){
    
                $today_appointment_date = date('Y-m-d');
                $users = appointment_db::select_all_appointments_today($today_appointment_date);
                
                $daily_appointments = array();
                $fields = array('email', 'first_name', 'last_name'); 
                $daily_appointments[] = $fields;
                
                                foreach($users as $user){
                                                $values=array();
                                                $values[] = $user->getEmail();
                                                $values[] = $user->getFName();
                                                $values[] = $user->getLName();

                                                $daily_appointments[] = $values;
                                }

                $content_comma_seperated = '';
                $sep = ",";
                foreach ($daily_appointments as $values) {

                    $content_comma_seperated .= implode($sep, $values);
                    $content_comma_seperated .= "\n"; // add separator between sub-arrays

    }
                $length = strlen($content_comma_seperated);
                header('Content-Description: File Transfer');
                header('Content-Type: text/plain');//<<<<
                header('Content-Disposition: attachment; filename=daily_appointment_users.csv');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . $length);
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                header('Pragma: public');
                echo $content_comma_seperated;// writes the contents to the file

                die();
}


function total_appointment_information_report(){
    
                $users = appointment_db::select_all_appointments_today($today_appointment_date);
                
                $daily_appointments = array();
                $fields = array('email', 'first_name', 'last_name'); 
                $daily_appointments[] = $fields;
                
                                foreach($users as $user){
                                                $values=array();
                                                $values[] = $user->getEmail();
                                                $values[] = $user->getFName();
                                                $values[] = $user->getLName();

                                                $daily_appointments[] = $values;
    }

                $content_comma_seperated = '';
                $sep = ",";
                foreach ($daily_appointments as $values) {

                    $content_comma_seperated .= implode($sep, $values);
                    $content_comma_seperated .= "\n"; // add separator between sub-arrays

    }
                $length = strlen($content_comma_seperated);
                header('Content-Description: File Transfer');
                header('Content-Type: text/plain');//<<<<
                header('Content-Disposition: attachment; filename=total_appointment_users.csv');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . $length);
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                header('Pragma: public');
                echo $content_comma_seperated;// writes the contents to the file

                die();
}
               


    