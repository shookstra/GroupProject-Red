<?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/head.php') ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/header.php');
    include('views/sideBar.php'); ?>

    <div class="wrapper">
        <div>
            <?php echo '<h1>' . htmlspecialchars($tutor->getFName() . "'s Page") . '</h1>'; ?>
            <h2>Times Available:</h2>
            <table class="availabilityTable">
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                </tr>
                <?php foreach ($availability as $available) : ?>
                    <?php echo '<tr>'; ?>
                    <?php echo '<td>' . ucfirst($available->getDay()) . '</td>'; ?>
                    <?php echo '<td>' . $available->getStart() . ' - ' . $available->getEnd() .  '</td>'; ?>
                    <?php echo '</tr>'; ?>
                <?php endforeach ?>
            </table>
            <h2>Subjects Available: </h2>
            <ul class="tutor-subjects">
                <?php foreach ($subjects as $subject) : ?>
                    <?php echo '<li>' . $subject['subName'] . '</li>' ?>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</body>

</html>