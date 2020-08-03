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
  $useremail=$_POST['select'];
  $checkin=$_POST['checkin'];
  $status=$_POST['status'];
  $result = mysqli_query($con,"Update conference set status='$status' where email='$useremail' and checkin='$checkin'");
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
    <button class="button is-link" onclick="location.href='Admin-Dashboard.php'">Back To Home</button>
    </div>
</nav>
<center>
          <table class="rwd-table">
            <tbody>
              <form method="POST">
              <tr>
                <th colspan="6">Conference Hall  Bookings Tabel</th>
              </tr>
              <th>Select</th>
              <th>Name</th>
              <th>Phone No</th>
              <th>Hall No</th>
              <th>No Of Days</th>
              <th>No Of Hours</th>
              <th>Time Slot</th>
              <th>Verify Id</th>
              <th>Status</th>
              <?php
                $result1 = mysqli_query($con,"select * from conference ");
                if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><input type="radio" name="select" value="<?php echo $row['email'] ?>">
                        <input type="hidden" name="checkin" value="<?php echo $row['checkin'] ?>"></td>
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
                    <td colspan="6">No Booking data found.Book a meal to view.</td>
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