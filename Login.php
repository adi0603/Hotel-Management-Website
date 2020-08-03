<?php
session_start();
$error=-1;
$message="";
if(isset($_POST['submit']))
{
    require 'connect.php';
    $email= $_POST['email'];
    $password= $_POST['password'];
    $result="";
    $result = mysqli_query($con,'select * from user where email="'.$email.'" and password="'.$password.'"');
    if (mysqli_num_rows($result) == 1)
    {
        $result1 = mysqli_query($con,"INSERT into logfile (email,category) values ('$email','Customer')");
        $_SESSION['email']= $email;
        header('Location: BookRoom.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="LS.css">
    <link rel="stylesheet" href="css/bulma.css.css">
    <link rel="stylesheet" href="css/Animate.css">
</head>
<body>
    <div ng-app="App" class="page-container"> 
        <div class="form-container" ng-class="done">
          <form method="POST">
              <div class="login-form">
                <h3>LOGIN</h3>
                <?php
                  if($error==0)
                  {
                    ?>
                    <p style="color: red"><?php echo $message;?></p>
                    <?php
                    $error=-1;
                  }
                ?>
                <div>
                  <input type="email" placeholder="Email" name="email" required>
                </div>
                
                <div>
                  <input type="password" placeholder="Password" name="password" required>
                </div>
                
                <button data-loading-btn class="" name="submit">
                  <span data-loaded-msg="Thank you!">Log in</span>
                </button>
              </div>
              <div class="credits">
                Don't have an account ? <a href="SignUp.php">Sign Up</a>
              </div>
              <div class="credits">
                Go To  <a href="Home.php">Home</a>
               </div>
               <div class="credits">
                <a href="User-Forgot.php">Forgot Password</a>
               </div>
            </div>
          </form>
        </div>
        </div>
</body>
</html>