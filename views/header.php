    <nav>
        <div class="logo">
            <i class="fas fa-chalkboard-teacher"></i>
            <h3>TUTOR SCHEDULING</h3>
        </div>
        <ul class="nav-links">
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="index.php?action=signUp">Sign Up</a></li>
                <li><a href="index.php?action=login">Login</a></li>
            <?php } else { ?>
                <li><a href="index.php?action=logout">Logout</a></li>
            <?php } ?>
        </ul>

        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /GroupProject/app.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /GroupProject/calendar.js"></script>