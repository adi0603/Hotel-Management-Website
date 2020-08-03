<?php
session_start();
$status1=array("Unpaid","Paid");
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}
require 'connect.php';
$email=$_SESSION['email'];
if (isset($_POST['submit'])) {
  $room_no=$_POST['select'];
  $pass=$_POST['pass'];
  $status=$_POST['status'];
  $result = mysqli_query($con,"Update spool set status='$status' where room_no='$room_no' and pass='$pass'");
    ?>
    <script type="text/javascript">
        alert("Status has been updated successfully.");
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swimming Pool Bookings</title>
    <link rel="stylesheet" href="Bookingtable.css">
    <link rel="stylesheet" href="css/bulma.css">
</head>
<body>
<nav class="navbar is-black">
    <div class="navbar-start">
    <button class="button is-black">Swimming Pool Booking Table</button>
    </div>
    <div class="navbar-centre">
    <button class="button is-link" onclick="location.href='servicerequest.php'">Back To Home</button>
    </div>
</nav>
<center>
          <table class="rwd-table">

            <tbody>
              <form method="POST">
              <tr>
                <th colspan="6">Swimming Pool Bookings Tabel</th>
              </tr>
              <th>Select</th>
              <th>Name</th>
              <th>Room No</th>
              <th>Pass</th>
              <th>Status</th>
              <?php
                $result1 = mysqli_query($con,"select name,spool.room_no,pass,spool.status from spool join booking where booking.room_no=spool.room_no");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><input type="radio" name="select" value="<?php echo $row['room_no'] ?>">
                        <input type="hidden" name="pass" value="<?php echo $row['pass'] ?>"></td>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["room_no"];?></td>
                      <td><?php echo $row["pass"];?></td>
                      <td>
                        <select id="Mealbook" name="status" class="input">
                          <?php
                            $lab=$row['status'];
                          for ($i=0; $i <2 ; $i++) {
                            if ($lab==$status1[$i]) {
                              ?>
                              <option value="<?php echo $status1[$i];?>" selected><?php echo $status1[$i];?></option>
                              <?php
                            }
                            else
                            {
                              ?>
                              <option value="<?php echo $status1[$i];?>"><?php echo $status1[$i];?></option>
                              <?php
                            }
                          }
                          ?> 
                        </select>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                  <center><td><button class="button is-link" name="submit">Update Payment Status</button></td></center>
                  <?php
                } 
                else
                {
                  ?>
                  <tr>
                    <td colspan="6">No Booking data found</td>
                  </tr>
                  <?php
                }
              ?>
            </form>
            </tbody>
          </table>
      </center>
</body>
</html>