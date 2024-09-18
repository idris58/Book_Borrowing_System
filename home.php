<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<body>
  <head>
    <title>Book Borrowing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <!-- <li><a href="#">Login</a></li> -->
        <li><a href="#">Token Validation</a></li>
        <!-- <li><a href="#">Book Search</a></li> -->
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

  <center><img src="assets/images/aiub-logo.svg" width="150" height="200" alt="aiub-logo";></center>
  <h1 style="text-align:center;">AIUB Library</h1>


  <div class="library">
      <div class="book-item">
          <img src="assets/images/book1.jpg" alt="Mathmetical Physics B D Gupta">
          <div class="book-title">Mathematical Physics B D Gupta</div>
          <div class="book-status">Status: Available</div>
      </div>
      <div class="book-item">
          <img src="assets/images/book2.jpg" alt="Discrete Mathematic Kenneth Rosen">
          <div class="book-title">Discrete Mathematics and Its Application Kenneth Rosen</div>
          <div class="book-status">Status: Available</div>
      </div>
      <div class="book-item">
          <img src="assets/images/book3.jpg" alt="Biogas Systems Principles KM Mital">
          <div class="book-title">Biogas Systems Principles And Applicatio KM Mital</div>
          <div class="book-status">Status: Available</div>
      </div>

      <div class="book-item">
          <img src="assets/images/book4.jpg" alt="46 Years IIT JEE-Amit M Agarwal">
          <div class="book-title">46 Years IIT JEE-Amit M Agarwal</div>
          <div class="book-status">Status: Available</div>
      </div>
      <div class="book-item">
          <img src="assets/images/book5.jpg" alt="Problems in General Physics-I E Irodov">
          <div class="book-title">Problems in General Physics-I E Irodov</div>
          <div class="book-status">Status: Available</div>
      </div>
      <div class="book-item">
          <img src="assets/images/book6.jpg" alt="Business Correspondence and Report Writi-Krishna Mohan">
          <div class="book-title">Business Correspondence and Report Writing-Krishna Mohan</div>
          <div class="book-status">Status: Available</div>
      </div>
  </div>

  <h2>Select the book you want to borrow</h2>
      <form action="process.php" method = "post" >
          <label for="Book">Choose a Book:</label>
          <select id="Book" name="Book">
              <option value="Mathmetical Physics B D Gupta|assets/images/book1.jpg">Mathmetical Physics B D Gupta</option>
              <option value="Discrete Mathematic sand Its Application Kenneth Rosen|assets/images/book2.jpg">Discrete Mathematic sand Its Application Kenneth Rosen</option>
              <option value="Biogas Systems Principles And Applicatio KM Mital|assets/images/book3.jpg">Biogas Systems Principles And Applicatio KM Mital</option>
              <option value="46 Years IIT JEE-Amit M Agarwal|assets/images/book4.jpg">46 Years IIT JEE-Amit M Agarwal</option>
              <option value="Problems in General Physics-I E Irodov|assets/images/book5.jpg">Problems in General Physics-I E Irodov</option>
              <option value="Business Correspondence and Report Writing-Krishna Mohan|assets/images/book6.jpg">Business Correspondence and Report Writing-Krishna Mohan</option>
          </select>
          
          Name:<input type="text" name="sname">
          ID:<input type="text" name="sid">
          Email:<input type="text" name="email">
          Borrow Date:<input type="date" name="bdate" value="<?php echo date('Y-m-d'); ?>" readonly>
          Return Date:<input type="date" name="edate">
          <input type="submit" value = "Submit" name="submit">
      </form>

</body>
</html> 