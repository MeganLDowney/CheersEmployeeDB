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


echo "<h1>List of Cheers Departments</h1>";

// create a query and store it to the $query variable
$query = "SELECT * FROM DEPARTMENT WHERE status = 'A' ORDER BY department_name ASC";
// open a database connection(use variable $connection from connection.php) and run the query
$result = mysqli_query($connection, $query);


echo "<table><thead><td class='center'>ID</td><td>Department</td><td>Number of Employees</td><td>Building Number</td><td class='center'>Status</td><td class='center border-none'>Edit Department</td><td class='center border-none'>Delete Department</td></thead>"; // open table and include table headings
// Returns an associative array of strings representing the fetched row.
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td>" . $row['department_id'] . "</td><td>" . $row['department_name'] . "</td><td class='center'>" . $row['num_of_employees'] . "</td><td class='center'>" . $row['building_number'] . "</td><td class='center'>" . $row['status'] . "</td><td class='center border-none'><a class='edit' href='edit_department.php?id=" . $row['department_id'] . "'>edit</a></td><td class='center border-none'><a class='delete' href='delete_department.php?id=" . $row['department_id'] . "'>delete</a></td></tr>";
}
echo "</table>"; // close table

echo "<a class='add' href='department_registration.php'>add new department</a>"

?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>