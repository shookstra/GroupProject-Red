<!DOCTYPE html>
<html lang="en">


<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <?php //var_dump($stuApps); 
        ?>
        <div class="appointments">
            <h1 class="title">Hi, <?php echo $_SESSION['user']->getFName() . ' here are your appointments.'; ?></h1>
            <?php foreach ($stuApps as $appointment) : ?>
                <div class="appointment">
                    <p><?php echo 'Appointment ID: ' . $appointment->getAppID(); ?></p>
                    <p><?php echo 'Subject ID: ' . $appointment->getSubID(); ?></p>
                    <p><?php echo 'With Tutor: ' . $appointment->getTutorID(); ?></p>
                    <p><?php echo 'on: ' . $appointment->getAppDate(); ?></p>
                    <p><?php echo 'at: ' . $appointment->getAppTime(); ?></p>
                    <p><?php echo 'Details: ' . $appointment->getDetails(); ?></p>
                    <p><?php echo 'Meeting Type: ' . $appointment->getMeetType(); ?></p>
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