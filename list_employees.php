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

if(isset($_GET['msg'])){
    echo "<p class='success'>" . $_GET['msg'] . "</p>";
  }

echo "<h1>List of Cheers Employees</h1>";

// create a query and store it to the $query variable
$query = "SELECT * FROM USER WHERE status = 'A'";
// open a database connection(use variable $connection from connection.php) and run the query
$result = mysqli_query($connection, $query);

// sort

//$first_name = $_GET['first_name'];
if(isset($_GET['first_name'])) {
  $query = "SELECT * FROM USER WHERE status = 'A' ORDER BY first_name ASC";
  $result = mysqli_query($connection, $query);
}

if(isset($_GET['email_address'])) {
  $query = "SELECT * FROM USER WHERE status = 'A' ORDER BY email_address ASC";
  $result = mysqli_query($connection, $query);
} 


echo "<table><thead><td class='center'>ID</td><td>Name <a class='sort' href='list_employees.php?first_name=" . $row['first_name'] . "'>sort a-z</a></td><td>Email <a class='sort' href='list_employees.php?email_address=" . $row['email_address'] . "'>sort a-z</a></td><td>Create Date</td><td class='center border-none'>Edit Employee</td><td class='center border-none'>Delete Employee</td></thead>"; // open table and include table headings
// Returns an associative array of strings representing the fetched row.
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['user_id'] . "</td><td>" . $row['first_name'] . " " . $row['last_name'] . "</td><td>" . $row['email_address'] . "</td><td>" . $row['create_date'] . "</td><td class='center border-none'><a class='edit' href='edit_employee.php?id=" . $row['user_id'] . "'>edit</a></td><td class='center border-none'><a class='delete' href='delete_employee.php?id=" . $row['user_id'] . "'>delete</a></td></tr>";
}
echo "</table>"; // close table

echo "<a class='add' href='employee_registration.php'>add new employee</a>"

?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>