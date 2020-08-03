<?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];

$result = mysqli_query($con,"select * from employee where email='$email'");
$fetch=mysqli_fetch_array($result);
if(isset($_POST['logout']))
{
  session_destroy();
  header('Location: EmpLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Home</title>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/Animate.css">
        <link rel="stylesheet" href="css/Admin-Dashboard.css">
        <link rel="stylesheet" href="css/Horizontal-Line.css">
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="account1.css">
        <link rel="stylesheet" href="account2.css">
        <script src="Js/Admin-Login.js"></script>
    </head>
    <body>
        <section id="sideMenu">
            <nav>
                <a href="Employee.php">Home</a>
                <a href="EmployeeAttendanceTable.php">Attendance</a>
            </nav>
          </section>
          
          <header>
            <form method="POST">
            <div class="user-area">
                <button class="button is-link" name="logout">Logout</button>
            </div>
          </form>
            <div class="column">
                <div class="textA">
                  <h3 class="title is-3">Employee</h3>
            </div>
            <div class="hr-theme-slash-2">
                <div class="hr-line"></div>
              </div>
              <div class="login-form"> 
                        <form method="POST"> 
                        <br>
                        <input type="email" id="email" value="<?php echo $email; ?>" class="input" disabled/>
                        <br><br>
                        <input type="text" value="<?php echo $fetch['name']; ?>" name="name" class="input" disabled>
                        <br><br>
                        <input type="text" value="<?php echo $fetch['phoneno']; ?>" name="name" class="input" disabled>
                        <br><br>
                        <input type="text" value="<?php echo $fetch['work']; ?>" name="name" class="input" disabled>
                      </form>
                      <br><br>
                      <button style="left:30%;"onclick="window.location.href = 'UpdatePhoneNoEmp.php'" class="button is-link">Update Phone No</button>
                  </div>
                  <br>
                  <br>
          </header>
    </body>
</html>