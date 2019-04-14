<html>
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
    </style>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"><img src="rebeats2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          
          <a class="nav-link" href="cart.php">Order Cart<!--<span class="badge badge-light"><//?php session_start(); echo $_SESSION['count'];?></span>-->
      </a>

      
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
      <form class="form-inline my-2 my-lg-0" action="searchRestaurant.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <br>
        <div class="jumbotron">
  <h1 class="display-4">RebEats!</h1>
  <p class="lead">Thank you for shopping with us! </p>
  <p>Here is your order information</p>
  <hr class="my-4">
  <div class="card" style="width: 36rem;">
  <div class="card-body">
    <h5 class="card-title">Order Summary</h5>
   
    <?php session_start();
    ?>
    <div class="table-responsive">
                    <table class ="table table-bordered">
                    <tr>
                        <th width ="30%"> Item Name</th>
                        <th width ="10%"> Quantity</th>
                        <th width ="13%"> Price details</th>
                        <th width ="17%"> Total price</th>
                        <th width ="13%"> Restaurant name</th>
                    </tr><?php
                        if(!empty ($_SESSION["cart"])){
                            $total = 0;
                            foreach ($_SESSION["cart"] as $key => $value){
                        
                    ?>
                     <form action="checkout.php" method ="POST">
                    <tr>
                        <td><input type="hidden" name="iname"><?php echo $value['item_name']; ?></input></td>
                        <td><input type="hidden" name="iquantity"><?php echo $value['item_quantity']; ?></input></td>
                        <td><input type="hidden" name="iprice">$<?php echo $value['product_price']; ?></input></td>
                        <td><input type="hidden" name="icost">$<?php echo number_format (($value['item_quantity'] * $value['product_price']), 2,'.','' );?></input></td>
                        <td><input type="hidden" name="rname"><?php echo $value['restaurant_name']; ?></input></td>
                    </tr>
                    <?php 
                        $total = $total + ($value['item_quantity'] * $value['product_price']);
                            }
                        
                        ?>
                    <tr>
                        <td colspan ="3" align ="right">Total </td>
                        <th align ="right"><input type="hidden" name="Total">$<?php echo number_format($total, 2 , '.', '');?></input></th>
                        
                            </form>
                        </td>
                        
                    </tr>
                        <?php } ?>
                        </table>
                </div>
  </div>
</div>
        </div>