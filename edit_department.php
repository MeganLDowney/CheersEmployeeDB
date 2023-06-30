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

  // print_r($_POST); // testing
  
  $department_id = $_POST['department_id'];
  $department_name = $_POST['department_name'];
  $num_of_employees = $_POST['num_of_employees'];
  $building_number = $_POST['building_number'];
  $status = $_POST['status'];
  // set up updated query
  $updated_query = "UPDATE DEPARTMENT
  SET department_name = '$department_name',
  num_of_employees = '$num_of_employees',
  building_number = '$building_number',
  status = '$status'
  WHERE department_id = $department_id";

  // echo $updated_query; // testing 

  // run the updated query
  $update_result = mysqli_query($connection, $updated_query);
  // message to header browser and to list_departments via urlencode()
  $msg = urlencode("Update was successful and has been recorded");
  
  
  if ($update_result) {
    header("Location: list_departments.php?msg=" . $msg);
    exit;
  }
  else {
    echo "<p class='error'>Update failed</p>";
  }
}
else {
  // get the id from the breadcrumbs (browser) using the GET method
  $department_id = $_GET['id'];
  // set up query
  $query = "SELECT * FROM DEPARTMENT WHERE department_id = $department_id";

  // echo $department_id;
  // echo $query; // testing
  // run the query
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
}

echo "<h1>Edit Department Form</h1>";

echo "<form action='edit_department.php' method='POST'>
      <label for='department_id'>Department ID:</label><br>
      <span class='required'>ID cannot be changed</span>
      <section>
      <input type='text' placeholder='Department ID' id='department_id' name='department_id' value='$row[department_id]' readonly>
      </section>
      <label for='department_name'>Department Name:</label>
      <section>
      <input type='text' placeholder='Department Name' id='department_name' name='department_name' value='$row[department_name]'>
      </section> 
      <label for='num_of_employees'>Number of Employees:</label> 
      <section>
      <input type='number' placeholder='Number of Employees' id='num_of_employees' name='num_of_employees' value='$row[num_of_employees]'>
      </section> 
      <label for='building_number'>Building Number:</label> 
      <section>
      <input type='number' placeholder='Building Number' id='building_number' name='building_number' value='$row[building_number]'>
      </section> 
      <label for='status'>Status:</label><br>
      <span class='required'>A = Active</span><br>
      <span class='required'>I = Inactive</span>
      <section>
      <input type='char' placeholder='Status' id='status' name='status' value='$row[status]'>
      </section>
      <input type='submit' value='Submit Edits'>
      </form>";

?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>