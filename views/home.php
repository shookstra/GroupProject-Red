<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <div class="appointments">
            <h1 class="title">Hi, <?php echo $_SESSION['user']->getFName() . ' here are your scheduled appointments.'; ?></h1>
            <?php foreach ($stuApps as $appointment) : ?>
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
                        <input type="Submit" value="Cancel Appointment" class="appointment-button">
                    </form>
                </div>
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
                        <label for="startDate">Start Date</label>
                        <input type="date" name="start_date">
                        <div id="hide_box" style="display: none">
                        <label for="endDate" >End Date</label>
                        <input type="date" name="end_date"></div>
                        <label for="endDate">Multiple Days</label>
                        <input type="checkbox" onclick="ShowHideDiv(this)">
                        <input type="submit" class="appointment-button" value="Add Holiday">
                    </div>
                </form>
            <?php } ?>
        </div>
        <div class="sideContent">
            <h2>Available Tutors</h2>
            <ul>
                <?php foreach ($tutors as $tutor) : ?>
                    <?php echo '<li><a href="index.php?action=viewTutorProfile&tutorID=' . $tutor->getTutorID() . '">' .
                            htmlspecialchars(
                                $tutor->getTutorID() . '. ' .
                                    $tutor->getFname() . ' ' .
                                    $tutor->getLname()
                            ) . '</a></li>';
                        ?>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /groupProject/calendar.js"></script>
</body>

</html>