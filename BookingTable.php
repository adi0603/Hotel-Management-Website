<?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];

$result = mysqli_query($con,"select * from user join personaldetails where user.email=personaldetails.email and user.email='$email'");
$fetch=mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
  $_SESSION['orderid']=$_POST['receipt'];
  header('Location: TxnStatus.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <link rel="stylesheet" href="Bookingtable.css">
    <link rel="stylesheet" href="css/bulma.css">
    <script src="https://kit.fontawesome.com/ab99e84824.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar is-black">
    <div class="navbar-start">
    <button class="button is-black">Room Booking Table</button>
    </div>
    <div class="navbar-centre">
    <button class="button is-link" onclick="location.href='Booking.php'">Back To Home</button>
    </div>
</nav>
<center>
          <table class="rwd-table">

            <tbody>
              <tr>
                <th colspan="10">Bookings</th>
              </tr>
              <th>Name</th>
              <th>Phone No</th>
              <th>Room Type</th>
              <th>Check In</th>
              <th>CheckIn Date</th>
              <th>CheckOut Date</th>
              <th>Persons</th>
              <th>Rooms</th>
              <th>Room No.</th>
              <th>Price</th>
              <th>Status</th>
                <?php
                $result1 = mysqli_query($con,"select * from booking where email='$email'");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $fetch["Q3"];?></td>
                      <td><?php echo $row["room_type"];?></td>
                      <td><?php echo $row["check_in"];?></td>
                      <td><?php echo $row["checkin"];?></td>
                      <td><?php echo $row["checkout"];?></td>
                      <td><?php echo $row["persons"];?></td>
                      <td><?php echo $row["rooms"];?></td>
                      <td><?php echo $row["room_no"];?></td>
                      <td><i class="fas fa-rupee-sign">&nbsp;<?php echo $row["price"];?></td>
                      <td>
                        <?php
                          if($row['status']=="1")
                          {
                            ?>
                            <form method="POST">
                              <input type="hidden" name="receipt" value="<?php echo $row['orderid'];?>">
                            <button class="button is-link" name="submit">Receipt</button>
                          </form>
                            <?php
                          }
                          elseif($row['status']=="0")
                          {
                            ?>
                            <!-- <form method="POST" action="confirmation1.php">
                              <button class="button is-link" name="paynow" value="<?php //echo $row["orderid"];?>">Pay Now</button>
                            </form> -->
                            <?php
                            echo "Unpaid";
                          }
                          else
                          {
                            echo "Paid With Cash";
                          }
                        ?>
                      </td>
                    </tr>
                    <?php
                  }
                } 
                else
                {
                  ?>
                  <tr>
                    <td colspan="10">No Booking data found.Book a room to view.</td>
                  </tr>
                  <?php
                }
              ?>
              <tr>
                <td colspan="10">
                  <div class="logout">
                    <!-- <input type="submit" onclick="location.href='BookRoom.php'" value="Book A Room"> -->
                   <button class="button is-link" name="submit" onclick="location.href='BookRoom.php'">Book</button>  
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
      </center>
</body>
</html>
