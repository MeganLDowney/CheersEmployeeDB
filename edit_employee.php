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
  
  $user_id = $_POST['user_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  // set up updated query
  $updated_query = "UPDATE USER
  SET first_name = '$first_name',
  last_name = '$last_name',
  password = '$password',
  status = '$status'
  WHERE user_id = $user_id";

  // echo $updated_query; // testing 

  // run the updated query
  $update_result = mysqli_query($connection, $updated_query);
  // message to header browser and to list_departments via urlencode()
  $msg = urlencode("Update was successful and has been recorded");
  
  
  if ($update_result) {
    header("Location: list_employees.php?msg=" . $msg);
    exit;
  }
  else {
    echo "<p class='error'>Update failed</p>";
    echo $updated_query;
  }
}
else {
  // get the id from the breadcrumbs (browser) using the GET method
  $user_id = $_GET['id'];
  // set up query
  $query = "SELECT * FROM USER WHERE user_id = $user_id";

  // echo $user_id;
  // echo $query; // testing
  // run the query
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
}

echo "<h1>Edit Employee Form</h1>";

echo "<form action='edit_employee.php?id=" . $user_id . "' method='POST'>
      <label for='user_id'>Employee ID:</label><br>
      <span class='required'>ID cannot be changed</span>
      <section>
      <input type='text' placeholder='Employee ID' id='user_id' name='user_id' value='$row[user_id]' readonly>
      </section>
      <label for='first_name'>First Name:</label>
      <section>
      <input type='text' placeholder='First Name' id='first_name' name='first_name' value='$row[first_name]'>
      </section> 
      <label for='last_name'>Last Name:</label> 
      <section>
      <input type='text' placeholder='Last Name' id='last_name' name='last_name' value='$row[last_name]'>
      </section> 
      <label for='password'>Password:</label> 
      <section>
      <input type='text' placeholder='Password' id='password' name='password' value='$row[password]'>
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