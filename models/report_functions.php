<?php

require_once('models/user.php');
require_once('models/user_db.php');
require_once('models/appointment.php');
require_once('models/appointment_db.php');
require_once('models/tutor.php');
require_once('models/tutor_db.php');
require_once('models/subject_db.php');
require_once('models/subject.php');
require_once('models/tutor_availability.php');

//gives the admin a csv file with all unique users since last time they requested the information
function Unique_user_information_report(){
    
       
        $users = user_db::select_all();
        $unique_users = array();

        $fields = array('user_email', 'first_name', 'last_name'); 

        $unique_users[] = $fields;
        //$old_users = array();

        
                foreach($users as $user){
                    $values=array();

                    $values[] = $user->getEmail();
                    $values[] = $user->getFName();
                    $values[] = $user->getLName();
                    $unique_users[] = $values;
                    
            
        }
               
                $content_comma_seperated = '';
                $sep = ",";

    foreach ($unique_users as $values) {
        
        $content_comma_seperated .= implode($sep, $values);
        $content_comma_seperated .= "\n"; // add separator between sub-arrays

    }
    var_dump($unique_users);
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

               
//gives admin a list of students who no show
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

 
//print out for the appointments for that day
function daily_appointment_information_report(){
    
                $today_appointment_date = date('Y-m-d');
                $users = appointment_db::select_all_appointments_today($today_appointment_date);
                
                $daily_appointments = array();
                $fields = array('student_email', 'student_last_name', 'tutor_last_name'); 
                $daily_appointments[] = $fields;
                
                                foreach($users as $user){
                                                $values = array();
                                                
                                                $email = user_db::get_user_email_by_id($user->getUserID());
                                                $values[] = $email['email'];
                                                
                                                $student_lname = user_db::select_user_lastname_by_id($user->getUserID());
                                                $values[] = $student_lname['lName'];
                                                
                                                $tutor_lname = tutor_db::get_tutor_lastname_by_id($user->getUserID());
                                                $values[] = $tutor_lname['lName'];

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

//total appointments since last time report was ran
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

// reminder email that admin has to click to send out. Set up to be ran daily
function reminder_email(){

    $date = date('Y-m-d');
    $current = date('w', strtotime($date));
    $subject = "My subject";
    
    $headers = "From: noreply@tutorschedule.com";

    
    if($current !== 5){
        $next_days_appointments = date("Y-m-d", strtotime("+1 day"));
    } else {
        $next_days_appointments = date("Y-m-d", strtotime("+3 day"));
    }
    
    
    $users = appointment_db::select_all_appointments_today($next_days_appointments);
    
    foreach($users as $user){
        
        $to = user_db::get_user_email_by_id($user->getUserID());
        $txt = "This is a reminder that you have a scheduled tutor appointment on : " . "\n" . $user->getAppDate() . " at: " . $user->getAppTime();
        
        mail($to, $subject, $txt, $headers);
    }
    
}

