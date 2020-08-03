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
    $name= $_POST['name'];
    $in=$_POST['in'];
    $out=$_POST['out'];
    $phoneno=$_POST['phoneno'];
    $hours= $_POST['hours'];
    $slot= $_POST['slot'];
    $id= $_POST['id'];
    $hall_no=rand(100,200);
    $result = mysqli_query($con,"INSERT into conference (email,name,phoneno,checkin,checkout,hours,slot,id,hall_no) values ('$email','$name','$phoneno','$in','$out','$hours','$slot','$id','$hall_no')");
    ?>
    <script type="text/javascript">
        alert("Your Conference Has been booked successfully.");
    </script>
    <?php
    header('Location: ConTable.php');
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
        <link rel="stylesheet" href="confake.css">
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
          <div class="user-area">
                <button class="button is-link" name="con" onclick='window.location.href="ConTable.php"'>View Booking</button>
            </div>
           
            <div class="column">
                <div class="textA">
                  <h3 class="title is-3">Conference Room Booking</h3>
            </div>
            <div class="hr-theme-slash-2">
                <div class="hr-line"></div>
                
              </div>
        
                <div class="login-form"> 
                        <form method="POST"> 
                        <input type="email" id="email" value="<?php echo $email; ?>" class="input" disabled/>
                        <input type="text" id="fn" placeholder="Name" name="name" class="input" required/>
                        <input type="number" id="phoneno" name="phoneno" placeholder="Phone No" class="input" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" required/>
                        <?php
                            $date=date("Y")."-".date("m")."-".date("d");
                            $date1=date('Y-m-d',strtotime($date . "+1 days"));
                        ?>
                        CheckIn Date:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="in" name="in" min='<?php echo $date ?>' title="Select end date of CheckIn"  required><br><br>
                        CheckOut Date:&nbsp;<input type="date" name="out" min='<?php echo $date1 ?>' title="Select end date of CheckOut" id="out" onchange="myFunction()" required>
                            <select id="Conference Hours" name="hours" class="input">
                                <option value="select">How Many Hours</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <select id="Time-Slot" name="slot" class="input">
                                <option value="select Time-Slot">Time-Slot</option>
                                <option value="7 AM">7 AM</option>
                                <option value="8 AM">8 AM</option>
                                <option value="9 AM">9 AM</option>
                                <option value="10 AM">10 AM</option>
                                <option value="11 AM">11 AM</option>
                                <option value="12 PM">12 PM</option>
                                <option value="1 PM">1 PM</option>
                                <option value="2 PM">2 PM</option>
                                <option value="3 PM">3 PM</option>
                                <option value="4 PM">4 PM</option>
                                <option value="5 PM">5 PM</option>
                                <option value="6 PM">6 PM</option>
                                <option value="7 PM">7 PM</option>
                                <option value="8 PM">8 PM</option>
                                <option value="9 PM">9 PM</option>
                                <option value="10 PM">10 PM</option>

                            </select>
                            <select id="govid" name="id" class="input">
                                <option value="select id">Select ID</option>
                                <option value="aadhar">Aadhar</option>
                                <option value="passport">passport</option>
                            </select>
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