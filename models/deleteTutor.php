<?php

$tutorID = $_REQUEST['selectedTutor'];
$delete_start = date('Y-m-d');
$tutor_appointments = appointment_db::select_tutor_appointments($tutorID, $delete_start);

if(!empty($tutorID)){
        if(!empty($tutor_appointments)){
            
            
                $daily_appointments = array();
                $fields = array('Student_Email', 'Student_Last_Name', 'Tutor_Last_Name', 'Appointment_Date', 'Details', 'Meet_Type'); 
                $daily_appointments[] = $fields;
                
                                foreach($tutor_appointments as $user){
                                                $values = array();
                                                
                                                $email = user_db::get_user_email_by_id($user->getUserID());
                                                $values[] = $email['email'];
                                                
                                                $student_lname = user_db::select_user_lastname_by_id($user->getUserID());
                                                $values[] = $student_lname['lName'];
                                                
                                                $tutor_lname = tutor_db::get_tutor_lastname_by_id($user->getTutorID());
                                                $values[] = $tutor_lname['lName'];
                                                
                                                $values[] = $user->getAppDate();
                                                
                                                $values[] = $user->getDetails();
                                                
                                                $values[] = $user->getMeetType();

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
                header('Content-Disposition: attachment; filename=deleted_tutor_appointments.csv');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . $length);
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                header('Pragma: public');
                echo $content_comma_seperated;// writes the contents to the file

                die();
                $active = 0;
                appointment_db::delete_tutor_appointments($tutorID);
                tutor_db::deleteTutor_Availability($tutorID);
                tutor_db::set_Tutor_activity($tutorID, $active);
                header("Location: index.php?action=home");
        } else {
            
        appointment_db::delete_tutor_appointments($tutorID);
        tutor_db::deleteTutor_Availability($tutorID);
        tutor_db::set_Tutor_activity($tutorID, 0);
        
        user_db::update_role($tutorID, 'Student');
        header("Location: index.php?action=home");
        
        }
}
