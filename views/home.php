<!DOCTYPE html>
<html lang="en">

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
                <div class="appointment">
                    <p><?php echo htmlspecialchars('Appointment ID: ' . $appointment->getAppID()); ?></p>
                    <p><?php echo htmlspecialchars('Subject: ' . $subject->getSubName()); ?></p>
                    <p><?php echo htmlspecialchars('With: ' . $tutor->getFName() . ' ' . $tutor->getLName()); ?></p>
                    <p><?php echo htmlspecialchars('on: ' . $appointment->getAppDate()); ?></p>
                    <p><?php echo htmlspecialchars('at: ' . $appointment->getAppTime()); ?></p>
                    <p><?php echo htmlspecialchars('Details: ' . $appointment->getDetails()); ?></p>
                    <p><?php echo htmlspecialchars('Meeting Type: ' . $appointment->getMeetType()); ?></p>
                </div>
            <?php endforeach ?>
        </div>
        <div class="sideContent">
            <h3>Side Content</h3>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam magnam quod tenetur magni quia illo fugit, illum necessitatibus
            provident ullam quaerat ut voluptatum dolor maiores debitis quas, molestias velit ad?
        </div>
    </div>
</body>

</html>