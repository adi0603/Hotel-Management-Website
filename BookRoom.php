    <?php
session_start();
if($_SESSION['email'] == "")
{
  header('Location: Home.php');
}

date_default_timezone_set("Asia/Kolkata");
require 'connect.php';
$email=$_SESSION['email'];
$result = mysqli_query($con,"select * from user join personaldetails where personaldetails.email=user.email and personaldetails.email='$email'");
$fetch=mysqli_fetch_array($result);

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
        <link rel="stylesheet" href="bookfake.css">
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
                <a href="BookRoom.php">Book A Room</a>
                <a href="Service.php">Service</a>
                <a href="Medical.php">Medical Need</a>
                <a href="Conference.php">Conference Room Book</a>
                <a href="Booking.php">Bookings</a>
                <a href="Account.php">Account</a>   
            </nav>
          </section>
          
          <header>
           
            <div class="column">
                <div class="textA">
                  <h3 class="title is-3">Room Booking</h3>
            </div>
            <div class="hr-theme-slash-2">
                <div class="hr-line"></div>
               
              </div>
                <div class="login-form"> 
                        <form method="POST" action="confimation.php">
                        <input type="email" id="email" value="<?php echo $email; ?>" name="email" class="input" disabled/>
                        <input type="text" id="fn" value="<?php echo $fetch['name']; ?>" class="input" name="name" required/>
                        <input type="text" id="fn" value="<?php echo $fetch['Q2']; ?>" class="input" name="nationality" required/>
                        <?php
                            $date=date("Y")."-".date("m")."-".date("d");
                            $date1=date('Y-m-d',strtotime($date . "+1 days"));
                        ?>
                        CheckIn Date:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="in" name="in" min='<?php echo $date ?>' title="Select end date of CheckIn"  required><br><br>
                        CheckOut Date:&nbsp;<input type="date" name="out" min='<?php echo $date1 ?>' title="Select end date of CheckOut" id="out" onchange="myFunction()" required>
                            <select id="Rooms" class="input" name="roomtype">
                                <option value="">Room Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Single Room Self Contained">Single Room Self Contained</option>
                                <option value="Double Room Self Contained">Double Room Self Contained</option>
                            </select>
                            <select id="govid" class="input" name="id">
                                <option value="select id">Select ID</option>
                                <option value="aadhar">Aadhar</option>
                                <option value="passport">passport</option>
                            </select>
                            <select id="board" class="input" name="board">
                                <option value="">Select Board</option>
                                <option value="Only Breakfast">Only Breakfast</option>
                                <option value="Half Board">Half Board</option>
                                <option value="Full Board">Full Board</option>
                            </select>
                            <select id="checkin" class="input" name="checkin">
                                <option value="">Select Check In</option>
                                <option value="morning">After 11 AM</option>
                                <option value="noon">After 5 PM</option>
                            </select>
                            <select id="Persons" class="input" name="person">
                                <option value="">No Of Persons</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <select id="noroom" class="input" name="rooms">
                                <option value="">How Many Rooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <select id="beds" class="input" name="beds">
                                <option value="">Bedding</option>
                                <option value="Doppelbett">Doppelbett</option>
                                <option value="Zweibett">Zweibett</option>
                            </select>
                            <?php
                                $result3=mysqli_query($con,"Select count(room_no) from booking");
                                $fetch3=mysqli_fetch_array($result3);
                                $rooms= 100+$fetch3['count(room_no)']+1;
                                $button="";
                                if($rooms>300)
                                {
                                    $button="disabled";
                                    ?>
                                        <script type="text/javascript">
                                            alert("Room is full No Room Available.");
                                        </script>
                                    <?php
                                }
                            ?>
                            <input type="hidden" name="room_no" value="<?php echo $rooms; ?>">
                        <br>
                        <br>
                        <button class="button is-primary" name="submit">Book</button>
                      </form>
                  </div>
                  
          </header>
          <script type="text/javascript">
            function myFunction() {
                var date1= document.getElementById("in").value
                var date2= document.getElementById("out").value
                if(date1>=date2)
                {
                    alert("Please Select proper date.");
                    document.getElementById("out").value="dd/mm/yyyy";
                }

            }
        </script>
    </body>
</html>