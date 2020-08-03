<?php
session_start();
require 'connect.php';
$email=$_SESSION['email'];
$result = mysqli_query($con,'select * from user where email="'.$email.'"');
$fetch=mysqli_fetch_array($result);
    $name= $_POST['name'];
    $in=$_POST['in'];
    $out=$_POST['out'];
    $roomtype= $_POST['roomtype'];
    $nationality= $_POST['nationality'];
    $id= $_POST['id'];
    $board= $_POST['board'];
    $checkin= $_POST['checkin'];
    $person= $_POST['person'];
    $rooms= $_POST['rooms'];
    $beds= $_POST['beds'];
    $order=rand(10000,500000);
    $orderid="OD".$order;
    $room_no=$_POST['room_no'];
      $result = mysqli_query($con,"INSERT into booking (name,email,checkin,checkout,room_type,nationality,id,board,check_in,persons,rooms,bedding,orderid,room_no) values ('$name','$email','$in','$out','$roomtype','$nationality','$id','$board','$checkin','$person','$rooms','$beds','$orderid','$room_no')");

$result1 = mysqli_query($con,'select * from booking where orderid="'.$orderid.'"');
$fetch1=mysqli_fetch_array($result1);
$roomtype=$fetch1['rooms'];
    if($roomtype="Single")
      {
        $roomtype="Singleroom";
      }
      elseif ($roomtype="Double") {
        $roomtype="Doubleroom";
      }
      elseif ($roomtype="Single Room Self Contained") {
        $roomtype="SingleSelf";
      }
      elseif ($roomtype="Double Room Self Contained") {
        $roomtype="DoubleSelf";
      }
$result2 = mysqli_query($con,"select * from price where type='$board'");
$fetch2=mysqli_fetch_array($result2);
$price =$fetch2[$roomtype];
$in=strtotime($fetch1['checkin']);
$out=strtotime($fetch1['checkout']);
$day1=date('d', $in);
$day2=date('d', $out);
$day1=(int)$day1;
$day2=(int)$day2;
$cost=$price*$person*$rooms*($day2-$day1);
$result = mysqli_query($con,"Update booking set price='$cost' where orderid='$orderid'");
?>
<!DOCTYPE html">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body class="perks " style="color: #2a2a2a; font-family: Arial, sans-serif; font-size: 18px; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; line-height: 18px; margin: 0 0 20px; padding: 0;">
  
 
  <table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#eae9ea" style="border-collapse: collapse;">
    <tr>
      <td valign="top" align="center" style="border-collapse: collapse;">
        <table width="600" cellspacing="0" cellpadding="0" border="0" class="main" style="border-collapse: collapse; margin-left: 30px; margin-right: 30px;">
          <tr>
            <td align="left" class="min_width" style="border-collapse: collapse; width: 600px;">

              <!-- BODY SECTION -->

              <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" style="border-collapse: collapse; margin-top: 10px;" class="">
                <tr>
                  <td align="left" style="border-collapse: collapse;">

                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
                      <tr style="margin: 0; padding: 0;">
                        <td align="center" style="border-collapse: collapse; border-spacing: 0; padding: 50px;">

                          <p style="font-size: 22px; line-height: 22px; margin: 0; padding: 0;"><strong>Hello</strong></strong></p>

                          <div style="text-align: left;" align="left">
                            <p style="font-size: 20px; line-height: 28px; margin: 20px 0 0; padding: 0;">
                              Thanks for Choosing us Hotel Basera. Please make your payment for confirm booking.
                            </p>
                          </div>
                          <form method="POST" action="pgRedirect.php">
                          <p style="font-size: 20px; line-height: 22px; margin: 0; padding: 0;">
                            <input type="submit" value="Make Payment" style="margin-top: 40px; color: #ffffff; text-decoration: none; display: inline-block; font-family: sans-serif; font-size: 20px; line-height: 46px; text-align: center; -webkit-text-size-adjust: none; font-weight: bold; white-space: nowrap; text-transform: uppercase; background-color: #eb1478; padding: 5px 50px;">
                          </p>
                          <input type="hidden" name="CUST_ID" value="<?php echo $email;?>">
                            <input type="hidden" name="INDUSTRY_TYPE_ID" value="Retail">                
                            <input type="hidden" name="CHANNEL_ID" value="WEB">
                            <input type="hidden" name="TXN_AMOUNT" value="<?php echo $cost;?>">
                            <input type="hidden" name="ORDER_ID" class="nice" value="<?php echo $orderid; ?>">
                        </form>
                          

                          <div style="width: 100px; margin: 35px 0px; border: 1px solid #e9e9e9;"></div>

                          <p style="font-size: 20px; line-height: 22px; margin: 0; padding: 0;">
                            Sincerely,
                          </p>

                          <p style="font-size: 22px; font-weight: bold; line-height: 22px; margin: 10px 0 0; padding: 0;">
                            Hotel Basera Team
                          </p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>


              <table width="100%" cellspacing="0" cellpadding="0" border="0" class="footer" style="border-collapse: collapse;">
                <tr>
                  <td align="center" class="footer" style="border-collapse: collapse; padding: 30px;">
                    <p style="font-size: 13px; font-family: Arial, sans-serif; color: #000001; line-height: 18px; margin: 0; padding: 0;">
                      <a class="footer-link" target="_blank" href="" style="color: #2a2a2a; text-decoration: none;">Hotel Basera</a>| <a class="footer-link" target="_blank" style="color: #2a2a2a; text-decoration: none;">Hotel Basera</a>                      | <a class="footer-link" target="_blank"  style="color: #2a2a2a; text-decoration: none;">Hotel Basera</a>                      | <a class="footer-link" target="_blank" 
                        style="color: #2a2a2a; text-decoration: none;">Hotel Basera</a>
                    </p>
                    <table width="200" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; margin: 30px 0;">
                      <tr>
                        <td align="center" width="30" style="border-collapse: collapse;">
                          <a href="" style="color: #000001; text-decoration: none;"><img src="https://email-media.s3.amazonaws.com/indiegogo/assets/facebook.png" width="25" style="display: block; border: none;"></a>
                        </td>
                      </tr>
                    </table>
                    <p style="font-size: 13px; font-family: Arial, sans-serif; color: #000001; line-height: 18px; margin: 0; padding: 0;">Your privacy is our priority.</p>
                    <p style="font-size: 13px; font-family: Arial, sans-serif; color: #000001; line-height: 18px; margin: 0; padding: 0;">We are happy to serve you 24/7.</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>