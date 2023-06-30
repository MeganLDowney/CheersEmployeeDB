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

// if the form has been submitted, do the update
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     $department_id = $_GET['id']; 

   // print_r($_POST); // testing
    // set up updated query
    $delete_query = "UPDATE DEPARTMENT SET status = 'I' WHERE department_id = $department_id";
    //$undo_delete_query = "UPDATE DEPARTMENT SET status = 'A' WHERE department_id = $department_id";
  
  
    // run the updated query
    $delete = mysqli_query($connection, $delete_query);
  
    // run the updated query
    //$undo_delete = mysqli_query($connection, $undo_delete_query);
  // echo $delete_query; // testing 
  
    // message to header browser and to list_departments via urlencode()
    $msg = urlencode("Department has been deleted");
    //$msg2 = urlencode("Department has been added back to records");
    
    
    if ($delete) {
      header("Location: list_departments.php?msg=" . $msg);
    }
    else if ($undo_delete) {
      header("Location: list_departments.php?msg=" . $msg2);
    }
    else {
        echo "<p class='error'>Update failed</p>";
        // echo $department_id; // testing
      }
  }

  // get the id from the breadcrumbs (browser) using the GET method
  $department_id = $_GET['id'];
  // echo $department_id; //testing
  // set up query
  $query = "SELECT * FROM DEPARTMENT WHERE department_id = $department_id";

  /*echo $department_id;
  echo $query; // testing*/
  
  // run the query
  $result = mysqli_query($connection, $query);

echo "<h1>Delete Department</h1>";

echo "<form action='delete_department.php?id=" . $department_id . "' method='POST'>
      <p>Do you really want to delete this department from records?</p>
      <table><thead><td class='center'>ID</td><td>Department</td><td>Number of Employees</td><td>Building Number</td><td class='center'>Status</td></thead>"; // open table and include table headings
// Returns an associative array of strings representing the fetched row.
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['department_id'] . "</td><td>" . $row['department_name'] . "</td><td class='center'>" . $row['num_of_employees'] . "</td><td class='center'>" . $row['building_number'] . "</td><td class='center'>" . $row['status'] . "</td></tr>";
}
echo "</table>
      <input type='submit' value='delete'><a class='back' href='list_departments.php'>go back</a>
      </form>";

      
?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>