<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/Animate.css">
        <link rel="stylesheet" href="css/Admin-Dashboard.css">
        <link rel="stylesheet" href="css/Horizontal-Line.css">
        <script src="Js/Admin-Login.js"></script>
        <link rel="stylesheet" href="cards2.css">
    </head>
    <body>
        <section id="sideMenu">
            <nav>
              <a href="Admin-Dashboard.php">Room Bookings</a>
              <a href="servicerequest.php">Service Request</a>
              <a href="ConferenceShow.php">Conference Room</a>
              <a href="adminaccount.php">Account</a>
            </nav>
          </section>
          <header>
            <div class="column">
                <div class="textA">
                  <h3 class="title is-3">ADMIN PORTAL</h3>
            </div>
            <span style="display:inline-block; width: YOURWIDTH;"></span> 
            <span style="display:inline-block; width: YOURWIDTH;"></span> 
            <div class="hr-theme-slash-2">
                <div class="hr-line"></div>
                <div class="hr-icon"><i class="material-icons">work</i></div>
                <div class="hr-line"></div>
              </div>
              <br><br>
            
              <div class="columns">
                <div class="column">
                  <div class="card">
                    <h2>Room</h2>
                    <hr/>
                    <center>
                    <p>
                      <strong>Press The </strong>
                    </p>
                    <p>
                      <strong>View Booking</strong>
                    </p>

                    <p>
                      <strong>Button To </strong>
                    </p>
                    <p>
                      <strong>Check The Room Booking</strong>
                    </p>
                    </center>
                    <button onclick="location.href='RoomCheck.php'">View Booking</button>
                  </div>
                </div>
          </header>
    </body>
</html>