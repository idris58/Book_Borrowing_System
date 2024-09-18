<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Library Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
    </nav>
    <div class="form-wrapper">
        <h2>Sign In</h2>
        <form action="loginProcess.php" method="POST">
            <div class="form-control">
                <input type="text" name="uname" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="pass" required>
                <label>Password</label>
            </div>
            <button type="submit">Sign In</button>
            <div class="form-help"> 
                <a href="securityQuestion.php">Forgot Password?</a>
            </div>
        </form>
    </div>
</body>
</html>
