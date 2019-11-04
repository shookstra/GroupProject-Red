<!DOCTYPE html>
<html lang="en">


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php'); ?>

        <div class="wrapper">
            <div class="card">
                <h1>Scheduled Appointments</h1>

                <table class="display" style="width: 800px;">
                    <tr>
                        <th>Tutor Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Details</th>

                    </tr>
                    <?php foreach ($stuApps as $sa) : ?>
                        <tr>
                            <td><?php echo $sa->getTutorID(); ?></td>
                            <td><?php echo $sa->getSubID(); ?></td>
                            <td><?php echo $sa->getAppDate(); ?></td>
                            <td><?php echo $sa->getAppTime(); ?></td>
                            <td><form action="index.php" method="POST">
                                    <input type="hidden" name="userID"
                                           value="<?php echo htmlspecialchars($sa->getUserID()); ?>"> 
                                    <input  type="submit" value="More Details">
                                    <input type="hidden" name="action" value="moreDetails">
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>



            </div>
            <div class="sideContent">
                <h3>Profile Information</h3>
                <p><strong><?php echo htmlspecialchars($$user->getUserID()); ?></strong></p>
                <p><strong><?php echo htmlspecialchars($$user->getFName()); ?></strong></p>
                <p><strong><?php echo htmlspecialchars($$user->getLName()); ?></strong></p>
                <p><strong><?php echo htmlspecialchars($$user->getEmail()); ?></strong></p>
            </div>
        </div>


    </body>

</html>