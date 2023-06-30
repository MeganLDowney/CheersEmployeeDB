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

echo "<h1>Register New Department Form</h1>";

echo "<form action='process_department_registration.php' method='POST'>
      <p class='required'>Department ID will be auto-generated by the system.</p>
      <section>
      <input type='text' placeholder='Department Name' id='department_name' name='department_name' required><span class='required'>required</span>
      </section>
      <section>
      <input type='number' placeholder='Number of Employees' id='num_of_employees' name='num_of_employees' required><span class='required'>required</span>
      </section>
      <section>
      <input type='number' placeholder='Building Number' id='building_number' name='building_number' required><span class='required'>required</span>
      </section>
      <input type='submit'>
      </form>";

?>
<img class="img1" src="images/cheers.jpg">
    </main>
    <footer class="footer">
      <p>&copy Megan Louise Downey - 2023</p>
    </footer>
    </body>
    </html>