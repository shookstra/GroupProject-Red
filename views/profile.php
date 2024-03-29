<!DOCTYPE html>
<html lang="en">


<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>
<?php $phoneNumber = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $_SESSION['user']->getPhone()); ?>


<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>
    <h2 class="banner">Profile</h2>
    <div class="wrapper">
        <div class="profile-information">
            <h1 style="margin-bottom: 20px; font-weight: bold">Hi, <?php echo $_SESSION['user']->getFName() . ' ' . $_SESSION['user']->getLName(); ?></h1>
            <h3 style="font-weight: bold">Profile Information</h3>
            <p><?php echo htmlspecialchars('User ID: ' . $_SESSION['user']->getUserID()); ?></p>
            <p><?php echo htmlspecialchars('First Name: ' . $_SESSION['user']->getFName()); ?></p>
            <p><?php echo htmlspecialchars('Last Name: ' . $_SESSION['user']->getLName()); ?></p>
            <p><?php echo htmlspecialchars('Email: ' . $_SESSION['user']->getEmail()); ?></p>
            <p><?php echo htmlspecialchars('Phone Number: ' . $phoneNumber); ?></p>
            <form>
                <input type="submit" value="Change My Information" class="update-info-button">
                <input type="hidden" value="ChangeMyInformation" name="action">
            </form>
        </div>
    </div>


    <script src="scripts/profileModal.js"></script>
</body>

</html>