<?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <link rel="stylesheet" href="Bookingtable.css">
    <link rel="stylesheet" href="css/bulma.css">
</head>
<body>
<nav class="navbar is-black">
    <div class="navbar-start">
    <button class="button is-black">Laundary Booking Table</button>
    </div>
    <div class="navbar-centre">
    <button class="button is-link" onclick="location.href='Booking.php'">Back To Home</button>
    </div>
</nav>
<center>
          <table class="rwd-table">

            <tbody>
              <tr>
                <th colspan="6">Laundary Bookings Tabel</th>
              </tr>
              <th>Name</th>
              <th>Room No</th>
              <th>No Of Clothes</th>
              <th>Dry Cleaning</th>
              <th>Status</th>
              <?php
                $result1 = mysqli_query($con,"select name,laundary.room_no,clothes,drycleaning,laundary.status from laundary join booking where booking.room_no=laundary.room_no and email='$email'");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["room_no"];?></td>
                      <td><?php echo $row["clothes"];?></td>
                      <td><?php echo $row["drycleaning"];?></td>
                      <td><?php echo $row["status"];?></td>
                    </tr>
                    <?php
                  }
                } 
                else
                {
                  ?>
                  <tr>
                    <td colspan="6">No Booking data found.Book a room to view.</td>
                  </tr>
                  <?php
                }
              ?>
              <tr>
                <td colspan="6">
                  <div class="logout">
                  <button class="button is-link" name="submit" onclick="location.href='LaundaryBook.php'">Book</button>  
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
      </center>
</body>
</html>