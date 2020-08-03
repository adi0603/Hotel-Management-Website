<?php
require 'connect.php';
$error=-1;
if(isset($_POST['subscribe']))
{
  $email= $_POST['email'];
  $result = mysqli_query($con,"INSERT into subscription (email) values ('$email')");
  $error =1 ;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BASERA HOTEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="css/Animate.css">
    <link rel="stylesheet" href="Hotel.css">
    <script src="Hotel.js"></script>
    <link rel="stylesheet" href="AnimationText.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="price.css">
    <link rel="stylesheet" href="css/bulma.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js">
  </head>
  <body>
    <?php
      if($error==3) 
      {?>
        <script type="text/javascript">
          swal("Thank You!", "You have successfully subscribed!", "success");
        </script>
        <?php
        $error=-1;
      }
    ?>
    <!-- Section 1 -->


    <section class="hero is-light is-medium">
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item">
                <section class="animated slideInLeft">
                <h3 href="" class="title is-3 ">BASERA HOTEL</h3>
              </section>
              </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <a class="navbar-item">
                  <section class="animated slideInRight">
                  <h5 href="" class="subtitle is-5 ">Home
                  </5>
                </section>
                </a>
                <a class="navbar-item">
                  <section class="animated slideInRight">
                  <h5 href="" class="subtitle is-5 ">Rooms
                  </5>
                </section>
                </a>
                <a class="navbar-item">
                  <section class="animated slideInRight">
                  <h5 href="" class="subtitle is-5 ">Services
                  </5>
                </section>
                </a>
                <a class="navbar-item">
                  <section class="animated slideInRight">
                    <a href="Login.php">
                        <h5  class="subtitle is-5 ">Booking</h5>
                   </a>
                </section>
                </a>
                <!-- <a class="navbar-item">
                  <section class="animated slideInRight">
                  <h5 href="" class="subtitle is-5 ">Sign Up
                  </h5>
                </section>
                </a>
                <a class="navbar-item">
                  <section class="animated slideInRight">
                  <h5 href="" class="subtitle is-5 ">Login
                  </h5>
                </section>
                </a> -->
              </div>
            </div>
          </div>
        </nav>
      </div>
    </section>

    <!-- Secion 2 -->

    <section class="hero is-white is-small">
      <div class="hero-body">
        <div class="container">
          <div class="columns">
            <div class="column">
              <img src="Picture/88.jpg" alt="" height="550" width="550">
            </div>
            <div class="column">
                <div class="textA">
                  <span class="letter r">W</span>
                  <span class="letter b">E</span>
                  <span class="letter o">L</span>
                  <span class="letter g">C</span>
                  <span class="letter o">O</span>
                  <span class="letter p">M</span>
                  <span class="letter p">E</span>
                  <Br>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>
                  <span class="letter b">T</span>
                  <span class="letter b">O</span>
                  <Br>
                  <span style="display:inline-block; width: YOURWIDTH;"></span>   
                  <span class="letter r">B</span>
                  <span class="letter b">A</span>
                  <span class="letter o">S</span>
                  <span class="letter g">E</span>
                  <span class="letter o">R</span>
                  <span class="letter p">A</span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-white ">
      <div class="content has-text-centered">
        <h3 class="title is-3">ROOMS</h3>
    </section>
 <section class="hero is-white ">
  <main>
    <div class="card-basic animated zoomIn">
      <div class="card-header header-basic">
        <h1>Single Room</h1>
      </div>
      <div class="card-body">
        <p><h2></h2></p>
        <div class="card-element-hidden-basic">
          <ul class="card-element-container">
            <li class="card-element"><strong>Rs 2500</strong> With Breakfast</li>
            <li class="card-element"><strong>Rs 3900</strong> For Half Board</li>
            <li class="card-element"><strong>Rs 5100</strong> For Full Board</li>
            <li class="card-element">With Air Conditioner</li>
          </ul>
          <!-- <button class="btn btn-basic" >Book Now</button> -->
        </div>
      </div>
    </div>
    <div class="card-premium animated zoomIn">
      <div class="card-header header-premium">
        <h1>Double Room</h1>
      </div>
      <div class="card-body">
        <p><h2></h2></p>
        <div class="card-element-hidden-premium">
          <ul class="card-element-container">
            <li class="card-element"><strong>Rs 2900</strong> With Breakfast</li>
            <li class="card-element"><strong>Rs 3900</strong> For Half Board</li>
            <li class="card-element"><strong>Rs 5100</strong> For Full Board</li>
            <li class="card-element">With Air Conditioner</li>
          </ul>
          <!-- <button class="btn btn-premium">Book Now</button> -->
        </div>
      </div>
    </div>
    
    <div class="card-standard animated zoomIn">
      <div class="card-header header-standard">
        <h1>Single Room</h1>
      </div>
      <div class="card-body">
        <!-- <p><h2>Self Contained</h2></p> -->
        <div class="card-element-hidden-standard">
          <ul class="card-element-container">
            <li class="card-element">Self Contained</li>
            <li class="card-element"><strong>Rs 3100</strong> With Breakfast</li>
            <li class="card-element"><strong>Rs 4500</strong> For Half Board</li>
            <li class="card-element"><strong>Rs 5700</strong> For Full Board</li>
            <li class="card-element">With Air Conditioner</li>
          </ul>
          <!-- <button class="btn btn-standard" >Book Now</button> -->
        </div>
      </div>
    </div>
    
<div class="card-premium animated zoomIn">
      <div class="card-header header-premium">
        <h1>Double Room</h1>
      </div>
      <div class="card-body">
        <!-- <p><h2>Self Contained</h2></p> -->
        <div class="card-element-hidden-premium">
          <ul class="card-element-container">
            <li class="card-element">Self Contained</li>
            <li class="card-element"><strong>Rs 3700</strong> With Breakfast</li>
            <li class="card-element"><strong>Rs 5100</strong> For Half Board</li>
            <li class="card-element"><strong>Rs 6300</strong> For Full Board</li>
            <li class="card-element">With Air Conditioner</li>
          </ul>
          <!-- <button class="btn btn-premium" >Book Now</button> -->
        </div>
      </div>
    </div>
  </main>
 </section>
  </section>
    <section class="hero is-white">
      <div class="content has-text-centered">
        <h3 class="title is-3">Services</h3>
    </section>
    <!-- Section 3 -->

    <section class="hero is-white is-medium">
      <div class="cardsa-list">
  
        <div class="carda 1">
          <div class="carda_image"> <img src="cards/Meals.png "/></div>
          <div class="carda_title title-red">
          </div>
        </div>
        
        <div class="carda t">
          <div class="carda_image"> <img src="cards/Transport.png" /> </div>
          <div class="carda_title title-white">
          </div>
        </div>
        
        <div class="carda 3">
          <div class="carda_image">
            <img src="cards/amb.png" />
          </div>
          <div class="carda_title">
          </div>
        </div>
          
          <div class="carda 4">
          <div class="carda_image">
            <img src="cards/sp.jpg"/>
            </div>
          <div class="carda_title title-black">
          </div>
          </div>

          <div class="carda 4">
            <div class="carda_image">
              <img src="cards/cr.jpg"/>
              </div>
            <div class="carda_title title-black">
            </div>
            </div>

            <div class="carda 4">
              <div class="carda_image">
                <img src="cards/l.png" />
                </div>
              <div class="carda_title title-black">
              </div>
              </div>
              <div class="carda 4">
                <div class="carda_image">
                  <img src="cards/rr.jpg" />
                  </div>
                <div class="carda_title title-black">
                </div>
                </div>
        </div>
    </section>

    <!-- Section 4 -->

    <section class="hero is-white is-medium">
    <div class="card-section">
      <h3 class="title is-3">Gallary</h3>
      <div class="card-list">
        <div class="card">
          <img src="Picture/1.jpg" >
        </div>
        <div class="card">
          <img src="Picture/2.jpg">
        </div>
        <div class="card">
          <img src="Picture/3.jpg">
        </div>
        <div class="card">
          <img src="Picture/4.jpg">
        </div>
        <div class="card">
          <img src="Picture/5.jpg">
        </div>
      </div>
    </div>
    </section>

    <!-- Section 5  -->

    <form method="POST">
    <section id="newsletter" class="section is-medium">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column">
            <p class="title">Connect With Us</p>
            <p class="subtitle is-4 has-text-black-light">We Have Weekly Offers, Discounts, etc.</p>
          </div>
    
          <div class="column">
            
              <div class="field is-grouped">
                <div class="control has-icons-left is-expanded">
                  <input type="email" value="" name="email" class="input is-medium is-flat" placeholder="email address" required="">
                  <span class="icon is-small is-left">
                    <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <i class="fas fa-envelope"></i> -->
                  </span>
                </div>
                
                <div class="control">
                  <input type="hidden" >
                  <button  onclick="Val(),getData()" type="submit "class="button is-medium is-link" name="subscribe">
                    <strong>Subscribe</strong>
                  </button>
                  <script>
                      $("button").click(function val() {
                        swal("Thank You For Subscribe")
                          });                  
                  </script>
                </div>
               
              </div>
          </div>
        </div>
      </div>
    </section>
    </form>


    <!-- Footer -->


    <section class="hero is-dark is-small">
      <div class="hero-body">
        <div class="content has-text-centered">
          <p>
            <div class="team">
            Hotel Basera Website Developed by 
            <br>Gla University
            <br>
            Contact No - 9410003304
          </div>
          </p>
      </div>
    </section>  
  </body>
</html>