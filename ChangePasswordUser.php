<?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];

$result = mysqli_query($con,"select * from user where email='$email'");
$fetch=mysqli_fetch_array($result);
if(isset($_POST['submit']))
  {
    $password1=$_POST['password1'];
    $password2= $_POST['password2'];
    if ($password1==$password2) {
      $result = mysqli_query($con,'update user set password="'.$password1.'" where email="'.$email.'"');
      ?>
      <script type="text/javascript">
        alert("Password Updated Successfully");
      </script>
      <?php
    }
    else
    {
      ?>
      <script type="text/javascript">
        alert("Sorry, Password Mismatch. Try Again");
      </script>
      <?php
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="ChangePassword.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar is-black">
        <div class="navbar-start">
        <button class="button is-black">Change Password</button>
        </div>
        <div class="navbar-centre">
        <button class="button is-link" onclick="location.href='Account.php'">Back</button>
        </div>
    </nav>
    <div id="box">
        <form method="POST" >
        <h1>Change Password </h1>
        <form>
          <p>
            <input type="password" name="password1" placeholder="Enter Password" id="p" class="password">
          </p>
          <p>     
            <input type="password" name="password2" placeholder="Confirm Password" id="p-c" class="password">
          </p>
          <br>
          <button class="button is-link" name="submit">Update</button>
        </form>
      </div>
</body>
</html>