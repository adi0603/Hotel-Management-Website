<?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Admin-Login.php');
}
require 'connect.php';
$email=$_SESSION['email'];

$result = mysqli_query($con,"select * from admin where email='$email'");
$fetch=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking Logs</title>
    <link rel="stylesheet" href="Bookingtable.css">
    <link rel="stylesheet" href="css/bulma.css">
</head>
<body>
<nav class="navbar is-black">
    <div class="navbar-start">
    <button class="button is-black">Employee Logs</button>
    </div>
    <div class="navbar-centre">
    <button class="button is-link" onclick="location.href='adminaccount.php'">Back</button>
    </div>
</nav>
<center>
          <table class="rwd-table">

            <tbody>
              <tr>
                <th colspan="3">Employee Logs</th>
              </tr>
              <th>Name</th>
              <th>Email</th>
              <th>Login Time</th>
              <?php
                $result1 = mysqli_query($con,"select * from employee join logfile where employee.email=logfile.email and category='Employee'");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["email"];?></td>
                      <td><?php echo $row["logintime"];?></td>
                    </tr>
                    <?php
                  }
                } 
                else
                {
                  ?>
                  <tr>
                    <td colspan="3">No Log data found.</td>
                  </tr>
                  <?php
                }
              ?>
                  
              <tr>
              </tr>
            </tbody>
          </table> 
      </center>
</body>
</html>