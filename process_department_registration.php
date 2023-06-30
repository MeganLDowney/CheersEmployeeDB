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

$building_name = $_POST['department_name'];
$num_of_employees = $_POST['num_of_employees'];
$building_number = $_POST['building_number'];

$q = "INSERT INTO DEPARTMENT (department_name, num_of_employees, building_number) 
      VALUES ('$building_name', '$num_of_employees', '$building_number' )";

echo "<h1>Department Registered</h1>";

$r = @mysqli_query($connection, $q);

if ($r) { // If it ran OK.
    echo "<p>Department was successfully created within the system.</p>"; }
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