<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/login.css">
    <title>Tutor Program - Log In</title>
</head>

<body>
    <div class="wrapper">
        <form action="index.php?action=loginValidation" method="POST">
            <div class="card">
                <h1 class="card-title">Sign In</h1>
                <div class="login-item">
                    <label for="email">Email</label><input type="email" name="email" class="submit-input">
                </div>
                <div class="login-item">
                    <label for="password">Password</label><input type="password" name="password" class="submit-input">
                </div>
                <?php if (!empty($loginErrors)) { ?>
                    <div class="login-item error">
                        <?php foreach ($loginErrors as $error) {
                                echo '<p>' . $error . '</p>';
                            } ?>
                    </div>
                <?php } ?>
                <div class="login-item">
                    <input type="hidden" name="action" id="action" value="loginValidation">
                    <input type="submit" value="Login" name="submit" class="submit-button">
                </div>
                <div class="login-item">
                    <a href="index.php?action=home" class="center">← Go Back</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>