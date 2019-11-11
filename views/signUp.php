<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/signUp.css">
    <title>Tutor Program - Sign Up</title>
</head>

<body>
    <div class="wrapper">
        <form action="index.php" method="POST" class="card">
            <h1 class="card-title">Sign Up</h1>
            <div class="login-item">
                <label for="firstName">First Name</label><input type="text" name="firstName" class="submit-input" value="<?php if (!empty($firstName)) {
                                                                                                                                echo $firstName;
                                                                                                                            } ?>">
            </div>
            <div class="login-item">
                <label for="lastName">Last Name</label><input type="text" name="lastName" class="submit-input" value="<?php if (!empty($lastName)) {
                                                                                                                            echo $lastName;
                                                                                                                        } ?>">
            </div>
            <div class="login-item">
                <label for="phone">Phone Number</label><input type="text" name="phone" class="submit-input" value="<?php if (!empty($phone)) {
                                                                                                                        echo $phone;
                                                                                                                    } ?>">
            </div>
            <div class="login-item">
                <label for="username">Email</label><input type="text" name="email" class="submit-input" value="<?php if (!empty($email)) {
                                                                                                                    echo $email;
                                                                                                                } ?>">
            </div>
            <div class="login-item">
                <label for="password">Password</label><input type="password" name="password" class="submit-input">
            </div>
            <div class="login-item">
                <label for="confirmPassword">Confirm Password</label><input type="password" name="confirmPassword" class="submit-input">
            </div>
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
                <input type="submit" value="Create Account" name="submit" class="submit-button">
            </div>
            <div class="login-item">
                <a href="index.php?action=login" class="center">Already Have an Account?</a>
                <a href="index.php?action=home" class="center">← Go Back</a>
            </div>
        </form>
    </div>

</body>

</html>