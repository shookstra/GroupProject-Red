<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php');
    ?>

    <div class="wrapper">
        <form method="POST" class="update-info-form">
            <h3 class="update-info-form-title">Update Your Information</h3>
            <div class="update-info-form-content">
                <label>User ID </label><input type="text" class="static-info-input" name=" userID" value="<?php echo htmlspecialchars($_SESSION['user']->getUserID()); ?>" readonly></<label>
                <label>First Name </label><input type="text" class="update-info-input" name="firstName" value="<?php if (!empty($firstName)) {
                                                                                                                    echo htmlspecialchars($firstName);
                                                                                                                } ?>">
                <label>Last Name </label><input type="text" class="update-info-input" name="lastName" value="<?php if (!empty($lastName)) {
                                                                                                                    echo htmlspecialchars($lastName);
                                                                                                                } ?>"></<label>
                <label>Phone Number </label><input type="text" class="update-info-input" name="phone" value="<?php if (!empty($phone)) {
                                                                                                                    echo htmlspecialchars($phone);
                                                                                                                } ?>"></<label>
                <?php if (empty($error)) { ?>
                    <?php
                        if (!empty($updateErrors)) { ?>
                        <div class="error">
                            <?php foreach ($updateErrors as $error) { ?>
                                <p><?php echo htmlspecialchars($error); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>

                <input type="hidden" name="action" id="action" value="updateValidation">
                <input type="submit" value="Update Information" name="submit" class="update-info-button">
            </div>
        </form>
    </div>
    <script src="scripts/profileModal.js"></script>
</body>

</html>