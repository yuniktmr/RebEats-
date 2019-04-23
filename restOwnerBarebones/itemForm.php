<!doctype html>
<html lang="en">
  <head>
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
  
  <?php
    $email = $_GET['email'];
  ?>

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
                  <li class='nav-item active'><a class='nav-link' href='#' onclick='logout()'>Log Out</a></li>";
                  ?>

                </ul>
            </div>
        </nav>
    
    <?php echo "
    <form method=POST action=addItems.php id=form style='margin-left: 10px; margin-top: 20px;'>
        <div class='form-group'>
        <label>Item Name</label>
        <input name='email' style='display: none' value='".$email."'>
        <input type='text' name='name' class='form-control' placeholder='Enter Name'>
        </div>
        <div class='form-group'>
        <label>Item Price</label>
        <input type='number' name='price' class='form-control' placeholder='Enter Price'>
        </div>
        <div class='form-group'>
        <label>Item Description</label>
        <input type='text' name='description' class='form-control' placeholder='Enter Description'>
        </div>
        <button type='submit' class='btn' style='display: inline; margin-top: 20px'>Add Item</button>
        <button class='btn' style='color: black; display: inline; margin-top: 20px'><a href='index.php?email=".$email."' style='color: black; display: inline'>Finish Adding</a></button>
        </form>";?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>