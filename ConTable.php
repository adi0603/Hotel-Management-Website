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
    <button class="button is-black">Conference Hall  Booking Table</button>
    </div>
    <div class="navbar-centre">
    <button class="button is-link" onclick="location.href='Booking.php'">Back To Home</button>
    </div>
</nav>
<center>
          <table class="rwd-table">
            <tbody>
              <tr>
                <th colspan="6">Conference Hall  Bookings Tabel</th>
              </tr>
              <th>Name</th>
              <th>Phone No</th>
              <th>Room No</th>
              <th>No Of Days</th>
              <th>No Of Hours</th>
              <th>Time Slot</th>
              <th>Verify Id</th>
              <th>Status</th>
              <?php
                $result1 = mysqli_query($con,"select * from conference where email='$email'");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["phoneno"];?></td>
                      <td><?php echo $row["hall_no"];?></td>
                      <td>
                        <?php
                        $in=strtotime($row['checkin']);
                        $out=strtotime($row['checkout']);
                        $day1=date('d', $in);
                        $day2=date('d', $out);
                        $day1=(int)$day1;
                        $day2=(int)$day2;
                        echo ($day2-$day1);
                        ?>
                      </td>
                      <td><?php echo $row["hours"];?></td>
                      <td><?php echo $row["slot"];?></td>
                      <td><?php echo $row["id"];?></td>
                      <td><?php echo $row["status"];?></td>
                    </tr>
                    <?php
                  }
                } 
                else
                {
                  ?>
                  <tr>
                    <td colspan="6">No Booking data found.Book a Hall to view.</td>
                  </tr>
                  <?php
                }
              ?>
              <tr>
                <td colspan="6">
                  <div class="logout">
                    <input type="submit" onclick="location.href='Conference.php'" value="Book">       
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
      </center>
</body>
</html>