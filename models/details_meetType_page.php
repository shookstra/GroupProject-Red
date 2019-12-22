<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

    $btn = $_GET['btn'];
    $date_info = $_GET['test'];
    
    $tutor_info = explode(",",$btn);
    $tutor_info_subID = $tutor_info[0];//subjec ID #
    $tutor_info_userID = $tutor_info[1];
    $tutor_info_ID = $tutor_info[2];//tutor ID
    $tutor_info_time = $tutor_info[3];//time selected
    $tutor_info_fName = $tutor_info[4];//tutor first name
    
    $jsInformation2 = explode(",", $date_info);
    $date_info_day = $jsInformation2[0];//day of week
    $date_info_month = $jsInformation2[1];//month clicked
    $date_info_date = $jsInformation2[2];//date clicked
    $date_info_year = $jsInformation2[3];//year pulled
    
    
    echo "<ul>";
    echo "<li>Appointment Month: ". $date_info_month ."</li>";
    echo "<li>Appointment Day: " . $date_info_date ."</li>";
    echo "<li>Tutor: " . $tutor_info_fName ."</li>";
    echo "<li>Time: " . $tutor_info_time ."</li><br>";
    echo "</ul>";
    
    echo "<center><p>What do you need help in? *Please let the tutor know what you need help in so they can assist you better</p>";
    if($tutor_info_subID == 1){
    echo "<form action='index.php' method='get'>";
					echo "<select id='details'>";
					echo "	<option value='general'>Need Help In:</option>";
					echo "	<option value='general'>General</option>";
                                        echo "  <option value='grammar'>Grammar</option>";
                                        echo "  <option value='citation'>Citation</option>";
                                        echo "  <option value='thesis'>Thesis</option>";
                                        echo "  <option value='writing'>Writing</option>";
					echo "</select>";
				echo "</form>";
    } else {
        echo "<form action='index.php' method='get'>";
					echo "<select id='details'>";
					echo "	<option value='general'>Need Help In:</option>";
					echo "	<option value='general'>General</option>";
                                        echo "  <option value='assignment'>Assignment</option>";
                                        echo "  <option value='theory'>Theory</option>";
                                        echo "  <option value='studying'>Studying</option>";
					echo "</select>";
				echo "</form>";
    }
    echo "<p>What kind of meeting would you like to schedule?(*If the tutor is not on your campus you will have to schedule a Zoom Meeting)</p>";
    echo "<input type='radio' id='meetTypeRadio' name='meeting' value='In_Person'>In Person Meeting</input><br>";
    echo "<input type='radio' id='meetTypeRadio' name='meeting' value='ZOOM'>Online Zoom Meeting</input><br>";
    echo "<button type='submit' value=". $tutor_info_subID . "," . $tutor_info_userID . "," . $tutor_info_ID . "," . $date_info_month . ",". $date_info_date . "," . $tutor_info_time . "," . $tutor_info_fName . "," . $date_info_year ." onclick='getTextArea(this.value)' >Send</button></center>";
    
    

?>
</body>
</html>
