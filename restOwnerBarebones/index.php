<!DOCTYPE html>
<html lang="en">

<head>

<!--START FIREBASE-->
<script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
    <script>
        // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAB6FTyFRYTnZCjSjrmVbdBb81SaxcxiLs",
    authDomain: "mvp-authentication.firebaseapp.com",
    databaseURL: "https://mvp-authentication.firebaseio.com",
    projectId: "mvp-authentication",
    storageBucket: "mvp-authentication.appspot.com",
    messagingSenderId: "347871480306"
  };
  firebase.initializeApp(config);
</script>
<!-- END FIREBASE -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <head>
        <meta charset="UTF-8">
        <title>Custom</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </head>
    <style>
        .navbar-nav > li{
            padding-left:30px;
            padding-right:30px;
        }
        .card-img-top {
            padding-left: 3vh;
            width: 35vh;
            height: 25vh;
            object-fit: cover;
        }
        .jbody{
            display: block;
        }
        .jorders{
            display: none;
        }


    </style>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<?php

require_once "../Login-Linked/includes/dbh.php"; //loads $conn for connecting to the database

$email = $_GET['email'];

$resultHeading = mysqli_query($conn, "SELECT rest_name FROM restaurants WHERE email = '$email';");
echo "<div class='navbar-brand' style='color: white;'>".$resultHeading->fetch_assoc()['rest_name']."</div>";

?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                <?php
                  echo "
                  <li class='nav-item active'><a href='index.php?email=".$email."' class='nav-link'>Menu</a></li>
                  <li class='nav-item active'><a href='itemForm.php?email=".$email."' class='nav-link'>Add Items</a></li>
                  <li class='nav-item active'><a href='orderView.php?email=".$email."' class='nav-link'>Show Current Orders</a></li>
                  <li class='nav-item active'><a href='restSettingsForm.php?email=".$email."' class='nav-link'>Account Settings</a></li>
                  <li class='nav-item active'><a class='nav-link' onclick='logout()' href='#'>Log Out</a></li>";
                  ?>

                </ul>
            </div>
        </nav>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" style='color: #457B9D'>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style=' padding-left: 150px'>

    <?php 

      $resultItems = mysqli_query($conn, "SELECT * FROM items WHERE rest_id = (SELECT rest_id FROM restaurants WHERE email = '$email');");

      $itemsArray = [];

      if($resultItems->num_rows > 0){

          while($row = $resultItems->fetch_assoc()){

              array_push($itemsArray, $row);

          }

        $index = 0;
        for($i = 0; $i< floor(count($itemsArray)/ 3); $i++){
          for($j = 0; $j<3; $j++){
            if($j == 0){
              echo "<div class='row'>";
            }

            echo "<div class='col-md-4' style='padding-top: 20px; padding-bottom: 20px'>
        
            <div class='card' style='width: 18rem; background-color: 	#343A40; color: white'>
            <div class='card-body'>
            <h5 class='card-title'>".$itemsArray[$index]['name']."</h5>
            <h6 class='card-subtitle mb-2'>$".$itemsArray[$index]['cost']."</h6>
            <p class='card-text'>".$itemsArray[$index]['description']."</p>
            <a href='editItem.php?email=".$email."&item=".$itemsArray[$index]['item_id']."' class='card-link' style:'color: #457B9D'>Edit Item</a>
            <a href='deleteItems.php?email=".$email."&item=".$itemsArray[$index]['item_id']."' class='card-link' style:'color: #457B9D'>Remove Item</a>
            </div>
            </div>

          </div>";

            if($j == 2){
              echo "</div>";
            }

            $index++;
          }

        }

        if($index <= (count($itemsArray)-1)){

          echo "<div class='row'>";

          for($i = $index; $i<count($itemsArray); $i++){

            echo "<div class='col-md-4'>
        
            <div class='card' style='width: 18rem; color: white; background-color: 	#343A40'>
            <div class='card-body'>
            <h5 class='card-title'>".$itemsArray[$i]['name']."</h5>
            <h6 class='card-subtitle mb-2'>$".$itemsArray[$i]['cost']."</h6>
            <p class='card-text'>".$itemsArray[$i]['description']."</p>
            <a href='editItem.php?email=".$email."&item=".$itemsArray[$index]['item_id']."' class='card-link' style:'color: #457B9D'>Edit Item</a>
            <a href='deleteItems.php?email=".$email."&item=".$itemsArray[$i]['item_id']."' class='card-link' style:'color: #457B9D'>Remove Item</a>
            </div>
            </div>

            </div>";

          }

          echo "</div>";

        }

      }

    ?>

    </div>
  </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script src='script.js'></script>

</body>

</html>
