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

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" style='color: #457B9D'>

    <?php

      require_once "../Login-Linked/includes/dbh.php"; //loads $conn for connecting to the database

      $email = $_GET['email'];

      $resultHeading = mysqli_query($conn, "SELECT rest_name FROM restaurants WHERE email = '$email';");
      echo "<div class='sidebar-heading'>".$resultHeading->fetch_assoc()['rest_name']."</div>";

    ?>

      <!-- <div class="sidebar-heading">Start Bootstrap </div> -->
      <div class="list-group list-group-flush">

        <?php
        echo "
        <a href='itemForm.php?email=".$email."' class='list-group-item list-group-item-action' style='color: #457B9D'>Add Items</a>
        <a href='#' class='list-group-item list-group-item-action bg-light' style='color: #457B9D'>Show Current Orders</a>
        <a href='restSettingsForm.php?email=".$email."' class='list-group-item list-group-item-action bg-light' style='color: #457B9D'>Account Settings</a>
        <a class='list-group-item list-group-item-action bg-light' style='color: #457B9D' onclick='logout()'>Log Out</a>";
        ?>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style='background-color: #1D3557; padding-left: 150px'>

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
        
            <div class='card' style='width: 18rem; color: #457B9D'>
            <div class='card-body'>
            <h5 class='card-title'>".$itemsArray[$index]['name']."</h5>
            <h6 class='card-subtitle mb-2'>Price: $".$itemsArray[$index]['cost']."</h6>
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
        
            <div class='card' style='width: 18rem; color: #457B9D'>
            <div class='card-body'>
            <h5 class='card-title'>".$itemsArray[$i]['name']."</h5>
            <h6 class='card-subtitle mb-2'>Price: $".$itemsArray[$i]['cost']."</h6>
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
