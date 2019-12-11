<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php');
    ?>

    <div class="wrapper">
        <div class="appointments">
            <?php if (empty($stuApps)) { ?>
                <h1 class="title">Hi, <?php echo $_SESSION['user']->getFName() . ' it doesnt look like you have anything scheduled.'; ?></h1>
            <?php } else { ?>
                <h1 class="title">Hi, <?php echo $_SESSION['user']->getFName() . ' here are your scheduled appointments.'; ?></h1>
            <?php } ?>
            <?php foreach ($stuApps as $appointment) : ?>
                <?php if (($appointment->getAppDate()) >= $today) { ?>
                    <?php $tutor = tutor_db::get_tutor_by_id($appointment->getTutorID()); ?>
                        <?php $subject = subject_db::select_subject_by_ID($appointment->getSubID()); ?>
                    <span class="appointment-header">
        <?php echo htmlspecialchars($subject->getSubName()); ?>
                        <i class="fas fa-calendar-check"></i>
                    </span>
                    <div class="appointment">
                        <p><?php echo htmlspecialchars('Appointment ID: ' . $appointment->getAppID()); ?></p>
                        <p><?php echo htmlspecialchars('With: ' . $tutor->getFName() . ' ' . $tutor->getLName()); ?></p>
                        <p><?php echo htmlspecialchars('on: ' . $appointment->getAppDate()); ?></p>
                        <p><?php echo htmlspecialchars('at: ' . date("g:i a", strtotime($appointment->getAppTime()))); ?></p>
                        <p><?php echo htmlspecialchars('Details: ' . $appointment->getDetails()); ?></p>
                        <p><?php echo htmlspecialchars('Meeting Type: ' . $appointment->getMeetType()); ?></p>
                        <form action="index.php" method="POST">
                            <input type="hidden" name="appointmentID" value="<?php echo htmlspecialchars($appointment->getAppID()); ?>">
                            <input type="hidden" name="action" value="cancelAppointment">
                            <input type="Submit" value="Cancel Appointment (WIP)" class="appointment-button">
                        </form>
                    </div>
                <?php } ?>
            <?php endforeach ?>

<?php if ($_SESSION['user']->getRole() == "Admin") { ?>
                <form action="index.php" class="add-holiday-form" method="post">
                    <input type="hidden" name="action" value="add_holiday">
                    <div class="add-holiday-form-header">
                        <h3>Add Holiday</h3>
                        <i class="fas fa-candy-cane"></i>
                    </div>
                    <div class="add-holiday-form-content">
                        <p class="info">This is used for adding days where SCC will be closed.</p>
                        <p class="info"><?php
                            if (!empty($_SESSION['date_range_error'])) {
                                echo $_SESSION['date_range_error'];
                            } else {
                                echo "Select your dates";
                            }
                            ?></p>
                        <label for="startDate">Start Date</label>
                        <input type="date" name="start_date">
                        <label for="endDate" class="hide_box" id="hide_box1">End Date</label>
                        <input type="date" name="end_date" class="hide_box" id="hide_box2">
                        <label for="endDate">Multiple Days</label>
                        <input type="checkbox" onclick="ShowHideDiv(this)">
                        <input type="submit" class="appointment-button" value="Add Holiday">
                    </div>
                </form>
<?php } ?>
<?php if ($_SESSION['user']->getRole() == "Tutor") { ?>
                <form action="index.php" class="change-availability" method="post">
                    <input type="hidden" name="action" value="changeAvailability">
                    <div class="change-availability-header">
                        <h3>Change Your Availability</h3>
                    </div>
                    <div class="change-availability-content">
                        <p class="info"><?php
                            if (!empty($_SESSION['time_error'])) {
                                echo $_SESSION['time_error'];
                            } else {
                                echo "Select your time";
                            }
                            ?></p><br>
                        <select name="day">
                            <option value="mon">Monday</option>
                            <option value="tue">Tuesday</option>
                            <option value="wed">Wednesday</option>
                            <option value="thur">Thursday</option>
                            <option value="fri">Friday</option>
                        </select>
                        <label for="start">Start Time:</label>
                        <input type="time" id="start" name="start_time" min="10:00" max="18:30" step="1800.00" >
                        <label for="end">End Time:</label>
                        <input type="time" id="end" name="end_time" min="10:30" max="19:00" step="1800.00" >


                        <input type="submit" class="appointment-button" value="Add Availability">

                    </div>
                </form>
<?php } ?>
<?php if ($_SESSION['user']->getRole() == "Admin") { ?>
                <form action="index.php" class="card">
                    <input type="hidden" name="action" value="addTutorValidation">
                    <div class="card-header">
                        <h3>Add Tutor</h3>
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="card-content">
                        <div class="info">Promote a student to a tutor</div>
                        <p>Available Users: </p>
                        <select name="selectedUser">
                            <?php foreach ($users as $user) : ?>
                                <?php if ($user->getRole() != 'Tutor' && $user->getRole() != 'Admin') { ?>
                                    <option value="<?php echo $user->getUserID(); ?>"><?php echo htmlspecialchars($user->getFName() . ' ' . $user->getLName()); ?></option>
        <?php } ?>
    <?php endforeach; ?>
                        </select>
                        <p>Tutor City: </p>
                        <select name="city">
                            <option value="Beatrice">Beatrice</option>
                            <option value="Lincoln">Lincoln</option>
                            <option value="Milford">Milford</option>
                        </select>
                        <input type="submit" value="Add Tutor" class="appointment-button">
                    </div>
                </form>
<?php } ?>
<?php if ($_SESSION['user']->getRole() == "Admin") { ?>
                <form action="index.php" class="card">
                    <input type="hidden" name="action" value="deleteTutor">
                    <div class="card-header">
                        <h3>Delete Tutor</h3>
                        <i class="fas fa-user-minus"></i>
                    </div>
                    <div class="card-content">
                        <div class="warning">This action cannot be undone</div>
                        <p>Delete Tutor</p>
                        <select name="selectedTutor">
    <?php foreach ($tutors as $tutor) : ?>
                                <option value="<?php echo $tutor->getTutorID(); ?>"><?php echo htmlspecialchars($tutor->getFName() . ' ' . $tutor->getLName()); ?></option>
    <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Delete Tutor" class="appointment-button">
                    </div>
                </form>
<?php } ?>
        </div>
        <div class="sideContent">
            <div class="sideContent-header">
                <h2>Available Tutors</h2>
                <i class="fas fa-chalkboard"></i>
            </div>
            <ul class="sideContent-main">
                <?php foreach ($tutors as $tutor) : ?>
                    <?php
                    echo '<li><a href="index.php?action=viewTutorProfile&tutorID=' . $tutor->getTutorID() . '">' .
                    htmlspecialchars(
                            $tutor->getFname() . ' ' .
                            $tutor->getLname()
                    ) . '</a></li>';
                    ?>
<?php endforeach ?>
            </ul>
            <?php if ($_SESSION['user']->getRole() == "Admin") { ?>
            <form action="" method="post" class="sideContent-main">
                <input type="hidden" name="action" value="print_unique_users">
                <button type="submit" name="unique_users" value="print_unique_users">Unique Users</button>
            </form>
            <form action="" method="post" class="sideContent-main">
                <input type="hidden" name="action" value="todays_appointments">
                <button type="submit" name="todays_appointments" value="todays_appointments">Today's Appointments</button>
            </form>
            <form action="" method="post" class="sideContent-main">
                <input type="hidden" name="action" value="reminder_email" disabled>
                <button type="submit" name="reminder_email" value="reminder_email" disabled>Reminder Email</button>
            </form>
            <?php } ?>
        </div>
    </div>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /groupProject/calendar.js"></script>
</body>

</html>
