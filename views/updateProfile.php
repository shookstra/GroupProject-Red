<!DOCTYPE html>
<html lang="en">


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
        include('views/sideBar.php');
        ?>

        <div class="wrapper">
            <div style="flex: 4">
                <h3 style="font-weight: bold">Profile Information</h3>
                  <form method="POST">
                      <p><label>User ID: </label><input type="text" name="firstName" value="<?php echo htmlspecialchars($_SESSION['user']->getUserID()); ?>" disabled></input></p>
                <p><label>First Name: </label><input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"></p>
                <p> <label>Last Name: </label><input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"></p>
                <p><label>Phone Number: </label><input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"></p>

                    <?php if (empty($error)) { ?>
                    <div>
                    <?php
                    if (!empty($updateErrors)) {
                        echo '<div class="error">';
                        foreach ($updateErrors as $error) {
                            echo '<p>' . htmlspecialchars($error) . '</p>';
                        }
                        echo '</div>';
                    }
                    ?>
                    </div>
<?php } ?>
              
                    <input type="hidden" name="action" id="action" value="updateValidation">
                    <input type="submit" value="Update Information" name="submit">
                </form>
            </div>
        </div>


        <script src="scripts/profileModal.js"></script>
    </body>

</html>