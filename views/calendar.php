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
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
        include('views/sideBar.php');
        ?>

        <h2 class="banner">Calendar</h2>
        <div class="wrapper">
            <div id="tbl">
                <table>

                    <?php
                    if (isset($_POST['next'])) {

                        $month = $_POST['month'] + 1;
                        $year = $_POST['year'];
                        if ($month > 12) {
                            $month = 1;
                            $year++;
                        }
                    } else if (isset($_POST['prev'])) {

                        $month = $_POST['month'] - 1;
                        $year = $_POST['year'];
                        if ($month < 1) {
                            $month = 12;
                            $year--;
                        }
                    } else {
                        $month = date("m");  //current month    Numeric representation of a month, with leading zeros:	01 through 12
                        $year = date("Y");   //current year  	A full numeric representation of a year, 4 digits	Examples: 1999 or 2003
                    }

                    date_default_timezone_set('America/Chicago');
                    $date = time();
                    $today = getdate();

                    $thismonth = date('m', $date);                          //Get current month
                    $thisyear = date('Y', $date);                           //Get current year
                    $days_in_month = cal_days_in_month(0, $month, $year);   //How many days have each month


                    $first_day = mktime(0, 0, 0, $month, 1, $year);

                    $title = date('F', $first_day);         //A full textual representation of a month, such as January or March: January through December

                    $day_of_week = date('D', $first_day);   //A textual representation of a day, three letters:	Mon through Sun



                    switch ($day_of_week) {    //If the first day of a month is Sunday we need 0 blank box. If its Monday we need 1 blank box and if its Saturday we need 6 blank boxes
                        case "Sun":
                            $blank = 0;
                            break;
                        case "Mon":
                            $blank = 1;
                            break;
                        case "Tue":
                            $blank = 2;
                            break;
                        case "Wed":
                            $blank = 3;
                            break;
                        case "Thu":
                            $blank = 4;
                            break;
                        case "Fri":
                            $blank = 5;
                            break;
                        case "Sat":
                            $blank = 6;
                            break;
                    }

                    echo "<tr> <th colspan=60 > $title $year </th> </tr>";  //Print the current month-year (table's title)
                    echo "<tr> 
					<td>Sun</td> 
					<td>Mon</td>
					<td>Tue</td>
					<td>Wed</td>
					<td>Thu</td>
					<td>Fri</td>
					<td>Sat</td> 
				 </tr>";

                    $day_count = 1;



                    while ($blank > 0) {         //Print the blank boxes before the first day of each month
                        echo "<td> </td>";
                        $blank = $blank - 1;
                        $day_count++;
                    }

                    $day_num = 1;




                    while ($day_num <= $days_in_month) {

                        if ($day_num == $today['mday'] && $thismonth == $month && $thisyear == $year) { //if day_num is the current day (and month-year)
                            $class = ' class = "day_num" ';  //Mark this day - we need to fill this box with red color (using CSS)
                            $id = ' class = "modalBtn" '; // sets the modalBtn id for the JS
                        } else {
                            $class = '';

                            $id = ' class = "modalBtn" '; // sets the modalBtn id for the JS
                        }

                        switch ($day_count) { // changes the designation of a number for a 3 character string for each day
                            case 1:
                                $day = 'Sun';
                                break;
                            case 2:
                                $day = 'Mon';
                                break;
                            case 3:
                                $day = 'Tue';
                                break;
                            case 4:
                                $day = 'Wed';
                                break;
                            case 5:
                                $day = 'Thu';
                                break;
                            case 6:
                                $day = 'Fri';
                                break;
                            case 7:
                                $day = 'Sat';
                                break;
                        }



                        $date_format = date("Y-m-d", strtotime($year . "-" . $month . "-" . $day_num));
                        $holidays = appointment_db::select_all_holidays();

                        if (in_array($date_format, $holidays)) {
                            echo "<td $class id = $day$day_num><button disabled>$day_num</button></td>";  //Print day's number, sets the class for the modal and also sets a name for the button for use in the modal, also disables the button
                        } else if (($day_num <= $today['mday'] && $thismonth == $month && $thisyear == $year) || ($month < $thismonth && $thisyear == $year) || ($day == 'Sat') || ($day == 'Sun')) {
                            echo "<td $class id = $day$day_num><button disabled>$day_num</button></td>";  //Print day's number, sets the class for the modal and also sets a name for the button for use in the modal, also disables the button
                        } else {
                            echo "<td $class id = $day$day_num><button $id  name = $day,$month,$day_num,$year >$day_num</button></td>";  //Print day's number, sets the class for the modal and also sets a name for the button for use in the modal
                        }


                        $day_num++;
                        $day_count++;

                        if ($day_count > 7) {         //Change row
                            echo "<tr> </tr>";
                            $day_count = 1;
                        }
                    }


                    while ($day_count > 1 && $day_count <= 7) {
                        echo "<td> </td>";
                        $day_count++;
                    }

                    if ($day_count == 1) {
                        echo "<td> </td>";
                        echo "<tr> </tr>";
                    }
                    ?>

                </table>


                <div class="calendar-next-buttons">
                    <form name="nav_form" method="POST" action="/groupproject/index.php?action=calendar">
                        <div id="inps">
                            <input type="Submit" name="prev" value="<- Previous" class="buttons" onClick="window.location.reload()" />
                            <input type="Submit" name="next" value="Next ->" class="buttons" onClick="window.location.reload()" />
                        </div>
                        <input type="hidden" name="month" value="<?php echo $month ?>" />
                        <input type="hidden" name="year" value="<?php echo $year ?>" />
                    </form>
                    <div class="showDate">
                        <div class="todayDate"></div>
                        <p>- Today's date</p>
                    </div>
                </div>
            </div>

            <div id="simpleModal" class="modal">
                <div class="modal-content">
                    <span class="closeBtn">&times;</span>
                    <div id="jsname"></div>
                    <h1 class="title">Hi, <?php echo $_SESSION['user']->getFName(); ?></h1>
                    <!--prints Users name on the top of Modal-->
                    <form action="index.php" method="post">
                        <select id="testing" onchange="showUser(this.value)" onclick="showUser(this.value)" autofocus>
                            <option value="">Select a subject:</option>
                            <?php foreach ($subjects as $s) : ?>
                                <option value="<?php echo htmlspecialchars($s->getSubID()) . "," . $_SESSION['user']->getUserID(); ?>"><?php echo htmlspecialchars($s->getSubName()); ?></option>
                                <!--puts subID and userID into the button to carry to the next pages-->
                            <?php endforeach; ?>
                        </select>
                    </form>
                    <div id="tutor_schedule" class="modal-info">Choose the time and tutor for your session</div>
                </div>
            </div>
            <div class="sideContent">
                <div class="sideContent-header">
                    <h2>Days of Subjects</h2>
                    <i class="fas fa-chalkboard"></i>
                </div>
                <div class="sideContent-main">
                    <ul class="available-users">
                        <?php
                        echo '<h3>*** Check here for Days Subjects are Aailable ***</h3>';
                        for ($i = 0; $i < sizeof($days_for_sub); $i++) {//for loop to go through each day in the array
                            echo '<br />';
                            echo '<li><strong>' . ucfirst($days_for_sub[$i]) . '</strong></li>';
                            echo '<hr />';
                            $subject_names = subject_db::select_subName_by_day($days_for_sub[$i]);
                            for ($j = 0; $j < sizeof($subject_names); $j++) {//for loop to print each subject under the day name
                                echo '<li>' . ucfirst($subject_names[$j]) . '<li>';
                            }
                        }
                        ?>
                    </ul>

                </div>
            </div>

            <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /groupProject/calendar.js"></script>
        </div>
    </body>

</html>