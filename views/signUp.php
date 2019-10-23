<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/signUp.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="card">
            <h1 class="card-title">Sign Up</h1>
            <div class="login-item">
                <label for="firstName">First Name</label><input type="text" name="firstName" class="submit-input">
            </div>
            <div class="login-item">
                <label for="lastName">Last Name</label><input type="text" name="lastName" class="submit-input">
            </div>
            <div class="login-item">
                <label for="phone">Phone Number</label><input type="text" name="phone" class="submit-input">
            </div>
            <div class="login-item">
                <label for="username">Email</label><input type="text" name="username" class="submit-input">
            </div>
            <div class="login-item">
                <label for="password">Password</label><input type="text" name="password" class="submit-input">
            </div>
            <div class="login-item">
                <label for="confirmPassword">Confirm Password</label><input type="text" name="confirmPassword" class="submit-input">
            </div>
            <?php if (empty($error)) { ?>
                <div class="login-item">
                    <p>ERROR HERE</p>
                </div>
            <?php } ?>
            <div class="login-item">
                <input type="hidden" name="action" id="action" value="login">
                <input type="submit" value="Create Account" name="submit" class="submit-button">
            </div>
            <div class="login-item">
                <a href="index.php?action=home" class="center">← Go Back</a>
            </div>

        </div>
    </div>

</body>

</html>