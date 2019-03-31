
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
 <script type="text/javascript">
     window.history.forward();
    </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="mainAbout.css">
<!-- icons -->
    <link rel = "stylesheet" href = "fontawesome-free-5.7.1-web/css/all.min.css">
<!--google fonts-->   
     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
<!--header-->
   <header>
      <!--nav bar-->
       <nav id="nav">
           <div class = "nav-logo">
                 <img src="images/rebeats2.PNG" class="logo">
               <i class="fa fa-arrow-down" id=toggle-btn></i>
           </div>
           <ul class="nav-links">
               <li><a href="index.php">Home</a></li>
               <li><a href="services.php">Services</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="locations.php">Locations</a></li>
               <li><a href="contacts.php">Contacts</a></li>
               <li class = "nav-icons">
                   <a href="#"><i class="fab fa-facebook"></i></a>
                   <a href="#"><i class="fab fa-instagram"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-linkedin"></i></a>
               </li>
           </ul>
       </nav>
       <div id="banner">
           <div class="banner-text">
           <p>services </p>
           </div>
           
    </div>  
    </header>
    <!--end of header-->
    <!--icon section-->
    <section id="icon-section">
        <a href=""><i class="fa fa-home"></i></a>
        <a href=""><i class="fa fa-book"></i></a>
        <a href=""><i class="fa fa-coffee"></i></a>
        <a href=""><i class="fa fa-anchor"></i></a>
    </section>
    <!--end of icon section-->
    <!-- Skills -->
    <section id="skills">
        <!--title-->
        <div class="title">
            <div class="title-icon">
                <i class="fa fa-gears"></i>
            </div>
            <div class="title-text">
                <h2 class= "title-heading">Services We Provide</h2>
                <p class="title-subheading"> Instant delivery 24 x 7</p>
            </div>
        </div>
        <!--End of title-->
        <div class="skills-center">
            <article class="skill">
                <i class="fab fa-apple">
                    <h3>Apple</h3>
                    <p>hahah</p>
                </i>
            </article>
            <article class="skill">
                <i class="fab fa-google">
                    <h3>Apple</h3>
                    <p>hahah</p>
                </i>
            </article>
            <article class="skill">
                <i class="fa fa-gear">
                    <h3>Apple</h3>
                    <p>hahah</p>
                </i>
            </article>
             <article class="skill">
                <i class="fab fa-android">
                    <h3>Apple</h3>
                    <p>hahah</p>
                </i>
            </article>

        </div>
    </section>
    <!-- End of Skills -->
    <!--jquery cdn-->
    
  
</body>
</html>