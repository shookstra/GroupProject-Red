<!DOCTYPE html>
<html lang="en">


<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <div style="flex: 4">
            <h2>Hi, <?php echo $_SESSION['user']->getFName() . ' ' . $_SESSION['user']->getLName(); ?></h2>
            <button id="myBtn">Open Modal</button>
            <div class="modal" id="myModal">
                <div class="modal-content">
                    <form action="">
                        <label for="fName">First Name: </label>
                        <input type="text" name="fName" value="<?php echo $_SESSION['user']->getFName(); ?>">

                        <label for="lName">Last Name: </label>
                        <input type="text" name="lName" value="<?php echo $_SESSION['user']->getLName(); ?>">

                        <label for="email">Email: </label>
                        <input type="text" name="email" value="<?php echo $_SESSION['user']->getEmail(); ?>">
                    </form>
                </div>
            </div>
        </div>

        <div class="sideContent">
            <h3 style="font-weight: bold">Profile Information</h3>
            <p><?php echo htmlspecialchars('User ID: ' . $_SESSION['user']->getUserID()); ?></p>
            <p><?php echo htmlspecialchars('First Name: ' . $_SESSION['user']->getFName()); ?></p>
            <p><?php echo htmlspecialchars('Last Name: ' . $_SESSION['user']->getLName()); ?></p>
            <p><?php echo htmlspecialchars('Email: ' . $_SESSION['user']->getEmail()); ?></p>
        </div>
    </div>


    <script src="scripts/profileModal.js"></script>
</body>

</html>