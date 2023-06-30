<html>
  <head>
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Sriracha&display=swap" rel="stylesheet">
    <title>Lab 6: File Upload</title>
  </head>
  <body>
    <header>
    <img class="image" src="images/cheers-logo.png" alt="Cheers Logo">
    <nav>
      <div class="nav">
        <a href="home.html">Home</a>
        <a href="list_employees.php">Employees</a>
        <a href="list_departments.php">Departments</a>
        </div>
        </nav>
    </header>

    <main>
    <?php

require('connection.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$password = $_POST['password'];

$q = "INSERT INTO USER (first_name, last_name, email_address, password, create_date, last_login) 
      VALUES ('$first_name', '$last_name', '$email_address', '$password', NOW(), NOW() )";

echo "<h1>Employee Registered</h1>";

$r = @mysqli_query($connection, $q);

if ($r) { // If it ran OK.
    echo "<p>Employee was successfully created within the system.</p>"; }
  else { // if there was an error and it did not run correctly show the error message from the system
    echo "<p>An error occurred. " . mysqli_error($connection) . "</p>";
  }



?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>