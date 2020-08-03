<?php
session_start();
if($_SESSION['email'] == "") 
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];
$result = mysqli_query($con,'select * from user where email="'.$email.'"');
$fetch=mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
    $room_no= $_POST['room_no'];
    $clothes= $_POST['clothes'];
    $linen= $_POST['linen'];
    $drycleaning= $_POST['drycleaning'];
    $result2 = mysqli_query($con,"INSERT into laundary (room_no,clothes,linen,drycleaning) values ('$room_no','$clothes','$linen','$drycleaning')");
    ?>
    <script type="text/javascript">
        alert("Your Laundary Has been booked successfully.");
    </script>
    <?php
    header('Location: LaundaryTable.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/Animate.css">
        <link rel="stylesheet" href="css/User-Dashboard.css">
        <link rel="stylesheet" href="css/Horizontal-Line.css">
        <link rel="stylesheet" href="fake.css">
        <link rel="stylesheet" href="book.css">
        <script src="js/Admin-Login.js"></script>
        <script src="Date.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    </head>
    <body>
        <section id="sideMenu">
            <nav>
                <a href="Service.php">Back</a>   
            </nav>
          </section>
          
          <header>           
            <div class="column">
                <div class="textA">
                  <h3 class="title is-3">Laundary Booking</h3>
            </div>
            <div class="hr-theme-slash-2">
                <div class="hr-line"></div>
                
              </div>
        
                <div class="login-form"> 
                        <form method="POST">
                            <?php
                            $date=date("Y")."-".date("m")."-".date("d");
                            $result1 = mysqli_query($con,"select * from booking where email='$email' and checkout>='$date'");$room_no="No Room Booked";
                            if(mysqli_num_rows($result1)!=0)
                            {
                                $fetch1=mysqli_fetch_array($result1);
                                $room_no=$fetch1['room_no'];
                            }
                            ?>
                        <input type="text" id="formeal" value="<?php echo $room_no; ?>" class="input" disabled/>
                        <input type="hidden" name="room_no" value="<?php echo $fetch1['room_no'] ?>">
                        <input type="number" id="clothes" name="clothes" placeholder="No Of Clothes" class="input" min="1" required/>
                            <select id="LaundaryBook" name="linen" class="input" required>
                                <option value="">Choose Linen</option>
                                <option value="light">Light</option>
                                <option value="medium">Medium</option>
                                <option value="heavy">Heavy</option>
                            </select>   
                            <select id="Laundarydry" name="drycleaning" class="input" required>
                                <option value="">Dry Cleaning</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <br>
                        <br>
                        <button class="button is-primary" name="submit">Book</button>
                      </form>
                  </div>
                
                  
          </header>
    </body>
</html>