<?php
session_start();
?>
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
        .jbody{
            display: block;
        }
        .jorders{
            display: none;
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


                            <a class="dropdown-item" href="searchItem.php">Food</a>


                        </div>
                    </li>

                    

                </ul>
                <li class="nav-item">
                        <a class="nav-link" href="../index.php">Log Out</a>
                    </li>
               
            </div>
        </nav>
        <br>
        <div class="jumbotron">
            <div class ="jhead">
                <h1 class="display-4">RebEats!</h1>
            </div>
            <div class ="jbody">
                <p class="lead">Founded in 2019 by a group of five industrious individuals, RebEats allows you to choose from a wide variety of items from multiple restaurants under our wing.</p>
                <p>Not only that, we ensure the food you order gets delivered
                    to your doorsteps at a very reasonable price almost instantly.</p>
                <hr class="my-4">
                <p>Here are your orders</p>
            </div>
            <!-------------TABLE OF ORDERS------------->
            <div class ="jorders">
                <table class="table table-striped">
                    <thead>
                        <!-------ORDER TABLE HEADERS------->
                        <tr>
                            <th scope="col">Order No</th>
                            <th scope="col">Delivery Address</th>
                            <th scope="col">Delivery Items</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col">Driver Pickup</th>
                            <th scope="col">Restaurant pickup</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <!--ORDERS RETRIEVED FROM DATABASE-->
                    <tbody>
                        <?php 
                            $con = mysqli_connect("localhost","root","olemiss2019","");
                            mysqli_select_db($con, "eatrebs");
                            $query = "SELECT orders.ord_id, orders.address, orders.cost, orders.rest_confirm, orders.dr_confirm, orders.fulfilled from orders WHERE cus_id=(SELECT cus_id FROM customers WHERE email='".$_SESSION['email']."')";
                            $result= mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)){
                        
                        
                        ?>
                        
                        <tr>
                            <th scope="row"><?php echo $row['ord_id'];?></th>
                            <td><?php echo $row['address'];?></td>
                            <td><?php
                                $results = mysqli_query($con, "SELECT items.name from items INNER JOIN order_items WHERE order_items.ord_id = {$row['ord_id']} AND items.item_id = order_items.item_id ");
                                while ($crow = mysqli_fetch_array($results)){
                                    echo $crow['name']." ";
                                }
                            ?>
                            </td>
                            <td><?php echo $row['cost'];?></td>
                            <td><?php if ($row['dr_confirm']==0 || $row['dr_confirm']==2){
                            echo "Pending";}elseif ($row['dr_confirm']==1){echo "Accepted";}
                            ?></td>
                            <td><?php if ($row['rest_confirm']==0){
                            echo "Not received";}else{echo "Received";}
                            ?></td>
                            <td><?php if ($row['dr_confirm']==0 || $row['rest_confirm']==0){
                            echo "Not Fulfilled";}else{echo "Fulfilled";}
                            ?></td>
                        </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--JS SCRIPT TO Toggle the table of orders-->
        <script type="text/javascript">
            $(document).ready(function ()
            {

                $(".jbody").click(function () {

                    $(".jorders").toggle(3000);
                });

            });


        </script>


        