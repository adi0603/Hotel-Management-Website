<?php
session_start();
$error=-1;
$message="";
if(isset($_POST['submit']))
{
    require 'connect.php';
    $email= $_POST['email'];
    $password= $_POST['password'];
    $result = mysqli_query($con,"select * from admin where email='$email' and password='$password'");
    if (mysqli_num_rows($result) == 1)
    {
        $result1 = mysqli_query($con,"INSERT into logfile (email,category) values ('$email','Admin')");
        $_SESSION['email']= $email;
        header('Location: Admin-Dashboard.php');
    }
    else
    {
        $error=0;
        $message="Email or Password mismatched!";
        ?>
      <script type="text/javascript">
        alert("Email or password mismatched! Please Try Again!!");
      </script>
      <?php
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/Admin-Login.css">
        <script src="Js/Admin-Login.js"></script>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/Animate.css">
        <title>Admin</title>
    </head>
    <body>
        <h1>Admin Login</h1>
        <br>
        <form method="POST">
            <label>
                <input type="email" id="fname" name="email" type="text" placeholder="Email" required>
                <span>Email</span>
            </label>
            <label>
                <input type="password" placeholder="Password" name="password" required>
                <span>Password</span>
            </label>
            <button class="button is-success" type="submit" name="submit">Login</button>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
            <BR></BR>
            
        </form>
        <a href="Admin-Forgot.php"><button style="left: -50%" class="button is-link">Forgot Password</button></a>
    </body>
</html>