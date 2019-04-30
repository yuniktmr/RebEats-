<?php

  require_once "../Login-Linked/includes/dbh.php";

  if(isset($_GET['order'])){

    $query = "UPDATE orders SET rest_confirm=TRUE WHERE ord_id=".$_GET['order'].";";

    error_log($query);

    mysqli_query($conn, $query);

    header("Location: orderView.php?email=".$_GET['email']);

  }

?>

<!doctype html>
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="itemFormCss.css">

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
  
  <?php

    echo "

    <H2 style='text-align: center; padding-top: 30px;'> Pending Orders </h2>";

    $query = "SELECT * FROM orders WHERE rest_id=(SELECT rest_id FROM restaurants WHERE email='".$email."') AND rest_confirm = FALSE;";

    $orders = mysqli_query($conn, $query);

    while($row = $orders->fetch_assoc()){
        
        $customerQuery = "SELECT * FROM customers WHERE cus_id='".$row['cus_id']."';";
        $itemQuery = "SELECT * FROM order_items WHERE ord_id='".$row['ord_id']."';";

        $customer = mysqli_query($conn, $customerQuery)->fetch_assoc();
        $items = mysqli_query($conn, $itemQuery);

        echo "<div class='card' style='width: 90rem; margin-left: 3rem; margin-bottom: 20px; text-align: center; background-color: #343A40; color: white;'>
            <div class='card-body'>
            <h4 class='card-title'>Submitted by ".$customer['name']." </h4>
            <p class='card-text'>
            ";
            while($itemRow = $items->fetch_assoc()){

                $itemName = mysqli_query($conn, "SELECT name FROM items WHERE item_id='".$itemRow['item_id']."';")->fetch_assoc()['name'];

                echo "<h4>".$itemName.": ".$itemRow['instructions']."</h4>";
            }

            echo "
            </p>
            <a href='orderView.php?email=".$email."&order=".$row['ord_id']."' class='card-link' onclick='submit()'>Accept Order</a>
        </div>
        </div>";
        
    }

    echo "

    <H2 style='text-align: center; padding-top: 30px;'> Accepted Orders </h2>";

    $query = "SELECT * FROM orders WHERE rest_id=(SELECT rest_id FROM restaurants WHERE email='".$email."') AND rest_confirm = TRUE AND fulfilled = FALSE;";

    $orders = mysqli_query($conn, $query);

    while($row = $orders->fetch_assoc()){
        
        $customerQuery = "SELECT * FROM customers WHERE cus_id='".$row['cus_id']."';";
        $itemQuery = "SELECT * FROM order_items WHERE ord_id='".$row['ord_id']."';";

        $customer = mysqli_query($conn, $customerQuery)->fetch_assoc();
        $items = mysqli_query($conn, $itemQuery);

        echo "<div class='card' style='width: 90rem; margin-left: 3rem; margin-bottom: 20px; text-align: center; background-color: #343A40; color: white'>
        <div class='card-body'>
            <h4 class='card-title'>Submitted by ".$customer['name']." </h4>
            <p class='card-text'>
            ";
            while($itemRow = $items->fetch_assoc()){

                $itemName = mysqli_query($conn, "SELECT name FROM items WHERE item_id='".$itemRow['item_id']."';")->fetch_assoc()['name'];

                echo "<h4>".$itemName.": ".$itemRow['instructions']."</h4>";
            }

            echo "
            </p>
        </div>
        </div>";
        
    }
        
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src='script.js'></script>
    
  </body>
</html>