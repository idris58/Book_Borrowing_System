<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Book Borrowing Confirmation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="#">Token Validation</a></li>
      <li><a href="#">Book Load</a></li>
      <li><a href="#">Send Reminder</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

    <form class="navbar-form navbar-left" >
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  
  </div>
</nav>

<div class="container">
<?php
if (isset($_POST['submit'])) { 
    $bookData = $_POST['Book'];
    list($book, $bookImage) = explode('|', $bookData);
    $name = $_POST['sname'];
    $id = $_POST['sid'];
    $email = $_POST['email'];
    $borrowDate = $_POST['bdate'] ;
    $expireDate = $_POST['edate'] ;
    $today = date("Y-m-d");
    $maxExpireDate = date("Y-m-d", strtotime("+7 days"));
    $hasErrors = false;
 
    echo "<div class='confirmation-box'>";
    if (empty($book) || empty($name) || empty($id) || empty($borrowDate) || empty($expireDate))
    {
        echo "<p class='error-message'>All fields are required.</p>";
        $hasErrors = true;
    } if (!preg_match("/^[a-zA-Z ]*$/", $name))
    {
        echo "<p class='error-message'>Invalid name. Only letters and white space allowed.</p>";
        $hasErrors = true;
    } if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $id))
    {
        echo "<p class='error-message'>Invalid ID format. The format should be **-*****-* (e.g., 22-46787-1).</p>";
        $hasErrors = true;
    } if ($borrowDate !== $today)
    {
        echo "<p class='error-message'>Borrowing date must be today's date.</p>";
        $hasErrors = true;
    } if ($expireDate < $today || $expireDate > $maxExpireDate)
    {
        echo "<p class='error-message'>Expire date must be within 7 days from today.</p>";
        $hasErrors = true;
    }if (!preg_match("/^\d{2}-\d{5}-\d{1}@student\.aiub\.edu$/", $email)) {
        echo "<p class='error-message'>Invalid email format. The email should be like 22-46787-1@student.aiub.edu.</p>";
        $hasErrors = true;
    }
    if (!$hasErrors) {
      if (isset($_COOKIE[$id])) {
          echo "<p class='error-message'>Please return the previous book first.</p>";
      } else {
          setcookie($id, $book, time() + 604800);
          echo "<h2>Book Borrowing Confirmation</h2>";
          if (!empty($bookImage)) {
            echo "<img src='$bookImage' alt='$book'>";
          }
          echo "<p style='text-align:center;'> $book</p>";
          echo "<p>Name: $name</p>";
          echo "<p>ID: $id</p>";
          echo "<p>Email: $email</p>";
          echo "<p>Borrow Date: $borrowDate</p>";
          echo "<p>Expire Date: $expireDate</p>";
      }
    }
} 
else
{
  echo "<p class='error-message'>Invalid request method.</p>";
}
echo "</div>";
?>
</div>
</body>
</html>