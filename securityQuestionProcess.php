<?php
$conn = new mysqli('localhost', 'root', '', 'librarydb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['uname']) && isset($_POST['sec_ans'])) {
    $uname = $_POST['uname'];
    $sec_ans = $_POST['sec_ans'];

    $sql = "SELECT * FROM securityqsn WHERE username = ? AND sec_ans = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $uname, $sec_ans);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['uname'] = $uname; 
        header("Location: forgotPassword.php");
        exit();
    } else {
        echo "Invalid answer to the security question.";
        header("refresh:2; url=securityQuestion.php"); 
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
