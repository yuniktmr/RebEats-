<?php
session_start();
if (isset($_GET['email'])){
$_SESSION['email'] = $_GET['email'];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Custom</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="main.css">
  <!--  font awesome-->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <!--  google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <!--jquery ui css cdn-->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">



  <!--  magnific popu css-->
  <link rel="stylesheet" href="magnific/magnific-popup.css">
  <!--  owl-->
  <link rel="stylesheet" href="owl/owl.carousel.min.css">
  <!--owl theme-->
  <link rel="stylesheet" href="owl/owl.theme.default.css">


    </head>
    <style>
        .navbar-nav > li{
            padding-left:30px;
            padding-right:30px;
        }
        .carousel-inner > .item {
             height: 400px;
        }
        #current-center img {
            position: relative;
            float: left;
            width:  370px;
            height: 250px;
            background-position: 50% 50%;
            background-repeat:   no-repeat;
            background-size:     cover;
}
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="rebeats2.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewOrders.php">My Orders <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Order Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Search for
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="searchRestaurant.php">Restaurant</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="searchItem.php">Food</a>


                        </div>
                    </li>

                   

                </ul>
                <li class="nav-item">
                        <a class="nav-link" href="../index.php">Log Out</a>
                    </li>
            </div>
        </nav>
        <!--Adddddddendum front end design----->
        <section id="work">
    <!--  title-->
    <div class="title">
      <div class="title-icon">
        <i class="fa fa-pencil-square-o"></i>
      </div>
      <div class="title-text">
        <h2 class="title-heading">Special Offerings</h2>
        <p class="title-subheading">From our partner restaurants</p>
      </div>
    </div>

    <!--end of  title-->
    <div class="work-center">
      <div class="button-container">
        <div class="button-group filter-button-group">
          <button data-filter="*">all</button>
          <button data-filter=".city">Seafood</button>
          <button data-filter=".country">Exotic</button>
          <button data-filter=".water">Popular</button>
        </div>
      </div>
      <div class="picture-container">
        <article class="picture-item city">
          <img src="prawn.jpg" alt="work-1">
        </article>
        <article class="picture-item country">
          <img src="biryani.jpg" alt="work-1">
        </article>
        <article class="picture-item water">
          <img src="frap.jpg" alt="work-1">
        </article>
        <article class="picture-item water">
          <img src="sushi.jpg" alt="work-1">
        </article>
        <article class="picture-item water">
          <img src="burger.jpg" alt="work-1">
        </article>
        <article class="picture-item water">
          <img src="pizza.jpg" alt="work-1">
        </article>
        <article class="picture-item water">
          <img src="pasta.jpg" alt="work-1">
        </article>
        
      </div>
    </div>
  </section>

  <!--  end of work section-->
  <!--about section-->
  
  <!--end of about section-->
  <!--current project section-->
  <section id="current">
    <!--  title-->
    <div class="title">
      <div class="title-icon">
        <i class="fa fa-image"></i>
      </div>
      <div class="title-text">
        <h2 class="title-heading">Our Service Locations</h2>
        <p class="title-subheading">We're working on extending our service locations further</p>
      </div>
    </div>

    <!--end of  title-->
    <div id="current-center">
      <article class="current-item">
        <a href="Cities/city.jpg">
          <img src="Cities/city.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/co.jpg">
          <img src="Cities/co.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/dc.jpg">
          <img src="Cities/dc.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/houston.jpg">
          <img src="Cities/houston.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/nyc.jpg">
          <img src="Cities/nyc.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/ok.jpg">
          <img src="Cities/ok.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/seattle.jpg">
          <img src="Cities/seattle.jpg" alt="current project">
        </a>
      </article>
      <article class="current-item">
        <a href="Cities/vegas.jpg">
          <img src="Cities/vegas.jpg" alt="current project">
        </a>
      </article>
    </div>
  </section>

  <!--end of current project section-->
  <!--numbers section-->
  <section id="numbers">
    <article class="number">
      <i class="fa fa-user"></i>
      <p class='numscroller' data-min='1' data-max='1000' data-delay='1000' data-increment='1'>1000</p>
      <h3>users</h3>
    </article>
    <article class="number">
      <i class="fa fa-car"></i>
      <p class='numscroller' data-min='1' data-max='1000' data-delay='1000' data-increment='1'>1000</p>
      <h3>Drivers</h3>
    </article>
    <article class="number">
      <i class="fa fa-spoon"></i>
      <p class='numscroller' data-min='1' data-max='1000' data-delay='1000' data-increment='1'>1000</p>
      <h3>Restaurants</h3>
    </article>
    <article class="number">
      <i class="fa fa-envelope"></i>
      <p class='numscroller' data-min='1' data-max='1000' data-delay='1000' data-increment='1'>1000</p>
      <h3>Feedbacks</h3>
    </article>
  </section>


  <!--end of numbers section-->
  <!--team-->
  <section id="team">
    <!--  title-->
    <div class="title">
      <div class="title-icon">
        <i class="fa fa-users"></i>
      </div>
      <div class="title-text">
        <h2 class="title-heading">meet our team</h2>
        <p class="title-subheading">The Agile 5</p>
      </div>
    </div>

    <!--end of  title-->
    <div id="team-center">
      <article class="team-member">
        <img src="images/team-1.jpg" alt="img">
        <h2>Hunter Finney</h2>
        <h5>developer</h5>
        <hr>
        <p>Great data handling, data manipulation, innovative and persuasive!</p>
        <div class="team-member-footer">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fa fa-google-plus"></i>
          </a>
        </div>
      </article>
      <article class="team-member">
        <img src="images/team-2.jpg" alt="img">
        <h2>Marcus Higgins</h2>
        <h5>developer</h5>
        <hr>
        <p>Great functionality, great back-end design, great blueprint</p>
        <div class="team-member-footer">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fa fa-google-plus"></i>
          </a>
        </div>
      </article>
      <article class="team-member">
        <img src="images/team-3.jpg" alt="img">
        <h2>Triston Blaney</h2>
        <h5>Front end</h5>
        <hr>
        <p>Polished pages, neat navigations, great ideas</p>
        <div class="team-member-footer">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fa fa-google-plus"></i>
          </a>
        </div>
      </article>
      <article class="team-member">
        <img src="images/team-4.jpg" alt="img">
        <h2>Keyon Jefferson</h2>
        <h5>Front end</h5>
        <hr>
        <p>Great designs at great pace with greater energy!</p>
        <div class="team-member-footer">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fa fa-google-plus"></i>
          </a>
        </div>
      </article>
    </div>
  </section>
  <!--end of team-->

  <!--progress-bars section-->

  <section id="progress-bars">
    <div class="progress-center">

     
      <div class="progress-item">
        <div class="progress-text">
          <h2>Site progress</h2>
          <h2>80%</h2>
        </div>
        <div id="p-bar-4"></div>
      </div>

    </div>
  </section>



  <!--end of progress-bars section-->
  <!--  pricing section-->
  <section id="pricing">
    <!--  title-->
    <div class="title">
      <div class="title-icon">
        <i class="fa fa-money"></i>
      </div>
      <div class="title-text">
        <h2 class="title-heading">our amazing prices</h2>
        <p class="title-subheading">Register your restaurant with us NOW!</p>
      </div>
    </div>

    <!--end of  title-->
    <div class="pricing-center">
      <!--  pricing card-->
      <article class="pricing-card">
        <h3>startup</h3>
        <h1>$0</h1>
        <ul>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>sharing tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>design tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>private messages</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>personal brand</p>
          </li>
        </ul>
        <a href="index.php">upgrade plan</a>
      </article>


      <!--  end of pricing card-->
      <!--  pricing card-->
      <article class="pricing-card custom">
        <h3>pro</h3>
        <h1>$50</h1>
        <ul>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>sharing tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>design tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>private messages</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>personal brand</p>
          </li>
        </ul>
        <a href="index.php">upgrade plan</a>
      </article>


      <!--  end of pricing card-->
      <!--  pricing card-->
      <article class="pricing-card">
        <h3>commercial</h3>
        <h1>$100</h1>
        <ul>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>sharing tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-check"></i>
            <p>design tools</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>private messages</p>
          </li>
          <li class="price-list">
            <i class="fa fa-times"></i>
            <p>personal brand</p>
          </li>
        </ul>
        <a href="index.php">upgrade plan</a>
      </article>


      <!--  end of pricing card-->
    </div>


  </section>



  <!--  end of pricing section-->

  <!--quotes-->
  <section id="quotes">
    <!--  title-->
    <div class="title">
      <div class="title-icon">
        <i class="fa fa-comments"></i>
      </div>
      <div class="title-text">
        <h2 class="title-heading">Customers' voice</h2>
        <p class="title-subheading"></p>
      </div>
    </div>

    <!--end of  title-->
    <div class="quotes-center owl-carousel owl-theme">
      <article class="quote">
        <img src="images/team-4.jpg" alt="image">
        <blockquote>
          <p>
            <i class="fa fa-quote-left"></i>Prompt delivery! Great Customer service! Great value! Highly recommended!</p>
          <footer>-customer</footer>
        </blockquote>
      </article>
      <article class="quote">
        <img src="images/team-3.jpg" alt="image">
        <blockquote>
          <p>
            <i class="fa fa-quote-left"></i>Nice food! Better delivery service!</p>
          <footer>-customer</footer>
        </blockquote>
      </article>
      
    </div>




  </section>
  <!--end of quotes-->
  <!--  footer-->
  <footer id="footer">
    <section id="footer-info">
      <div class="info-center">
        <div class="info-item">
          <i class="fa fa-check"></i>
          <p>Started delivery services in Colorado</p>
        </div>
        <div class="info-item">
          <i class="fa fa-check"></i>
          <p>Started delivery services in Utah</p>
        </div>
        <div class="info-item">
          <i class="fa fa-check"></i>
          <p>Started delivery services in Maryland</p>
        </div>
        
      </div>
    </section>
    <section id="footer-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.31571556965!2d-74.26056067662951!3d40.69714773656588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1518246880393"
        width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
  </footer>

  <!-- end of footer-->
  <!--  fake logo image could be found on
 https://github.com/pigment/fake-logos
 -->


  <!--jquery cdn-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--  images loaded-->
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js">
  </script>
  <!-- isotope-->
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js">
  </script>
  <!--jquery ui cdn-->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!--  iso.js-->
  <script src='iso.js'></script>
  <!--  magnific-->
  <script src="magnific/jquery.magnific-popup.min.js"></script>
  <!--  script.js-->
  <!-- <script src="script.js"></script> -->
  <!--script magnific.js-->
  <script src="magnific/magnific.js"></script>
  <!--  numscroller-->
  <script src="numscroller-1.0.js"></script>
  <!--  owl js-->
  <script src="owl/owl.carousel.min.js"></script>

</body>

</html>
    </body>
</html>
