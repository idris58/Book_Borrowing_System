<?php
$conn = new mysqli('localhost', 'root', '', 'librarydb');

if (isset($_POST['uname']) && isset($_POST['newpass'])) {
    $uname = $_POST['uname'];
    $newpass = $_POST['newpass'];

    $sql = "SELECT * FROM userinfo WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $updateSql = "UPDATE userinfo SET password = ? WHERE username = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $newpass, $uname);
        if ($updateStmt->execute()) {
            echo "Password has been updated successfully!";
            header("refresh:2; url=index.php"); 
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Username not found!";
        header("refresh:2; url=forgotPassword.php");
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
