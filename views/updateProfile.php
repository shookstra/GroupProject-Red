<!DOCTYPE html>
<html lang="en">


<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <div style="flex: 4">
            <h3 style="font-weight: bold">Profile Information</h3>
            <p><?php echo htmlspecialchars('User ID: ' . $_SESSION['user']->getUserID()); ?></p>
            <label>First Name: </label><input type="text" name="firstName" class="submit-input" value="<?php echo htmlspecialchars($_SESSION['user']->getFName()); ?>">
            <label>Last Name: </label><input type="text" name="lastName" class="submit-input" value="<?php echo htmlspecialchars($_SESSION['user']->getLName()); ?>">
            <label>Phone Number: </label><input type="text" name="phone" class="submit-input" value="<?php echo htmlspecialchars($_SESSION['user']->getPhone()); ?>">

                  <?php if (empty($error)) { ?>
                <div class="login-item">
                    <?php if (!empty($registrationErrors)) {
                            echo '<div class="error">';
                            foreach ($registrationErrors as $error) {
                                echo '<p>' . htmlspecialchars($error) . '</p>';
                            }
                            echo '</div>';
                        } ?>
                </div>
            <?php } ?>
            <div class="login-item">
                <input type="hidden" name="action" id="action" value="registrationValidation">
                <input type="submit" value="update Information" name="submit" class="submit-button">
            </div>
        </div>
    </div>


    <script src="scripts/profileModal.js"></script>
</body>

</html>