<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location: securityQuestion.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-wrapper">
        <h2>Forgot Password</h2>
        <form action="forgotPasswordProcess.php" method="POST">
            <div class="form-control">
                <input type="text" name="uname" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="newpass" required>
                <label>New Password</label>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
