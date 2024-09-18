<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Question</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-wrapper">
        <h2>Answer Security Question</h2>
        <form action="securityQuestionProcess.php" method="POST">
            <div class="form-control">
                <input type="text" name="uname" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="text" name="sec_ans" required>
                <label>What was the name of your first pet?</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
