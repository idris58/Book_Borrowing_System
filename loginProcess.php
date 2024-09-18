<?php
session_start();
$conn = mysqli_connect('localhost','root','','librarydb');
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    if (empty($username) || empty($password)) {
        echo "Username and password cannot be empty.";
    } else {
        $sql = "SELECT * FROM userinfo WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            
            header("Location: home.php");
            exit();
        } else {
            echo "User not found or invalid login credentials.";
            header("refresh: 2; url = index.php");
            exit();
        }
    }
}
?>
