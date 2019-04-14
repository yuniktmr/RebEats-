<?php
session_start();
$con = mysqli_connect("localhost", "root", "olemiss2019", "eatrebs");
if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if (!in_array($_GET['item_id'], $item_array_id)) {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_GET['item_id'],
                'item_name' => $_POST['hidden_name'],
                'product_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity'],
                'restaurant_name' => $_POST['rest_name'],
                'descript' => $_POST['description'],
                 'restaurant_id' => $_POST['rest_id'],
            );
            $_SESSION['cart'][$count] = $item_array;

            echo'<script>window.location="cart.php"</script>';
        } else {
            echo '<script>alert("Product already in the cart")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET['item_id'],
            'item_name' => $_POST['hidden_name'],
            'product_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'],
            'restaurant_name' => $_POST['rest_name'],
            'descript' => $_POST['description'],
             'restaurant_id' => $_POST['rest_id'],
        );
        $_SESSION['cart'][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION['cart'] as $keys => $value) {
            if ($value['product_id'] == $_GET['item_id']) {
                unset($_SESSION['cart'][$keys]);

                echo'<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>
<html>
    <head>
        <title>crud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">-->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <style>
            body{
                font-family: 'Raleway', sans-serif;
            }
            .product{
                width: 100%;

                border: 1px solid #eaeaec;
                margin: -1px 19px 3px -1px;
                padding: 10px;
                text-align: center;
                background-color: #efefef;
            }
            .product img{
                position: relative;
                float: left;
                width:  200px;
                height: 200px;
                background-position: 90% 90%;
                background-repeat:   no-repeat;
                background-size:     cover;
            }


            table, th ,tr{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;

            }
            .title2{
                text-align: center;
                color: #f40019;
                background-color: #DDEBFF;
                padding: 2%;
            }
            h2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;

            }
            table th{
                background-color: #efefef;
            }
            .navbar-nav > li{
                padding-left:30px;
                padding-right:30px;
            }
            .card-img-top {
                width: 35vh;
                height: 25vh;
                object-fit: cover;
            }
        </style>
    </head>
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
                        <a class="nav-link" href="index.php">My Orders <span class="sr-only">(current)</span></a>
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
                <form class="form-inline my-2 my-lg-0" action="searchRestaurant.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class ="container" style="width:65%">
            <h2> Shopping Cart <i class="fas fa-shopping-cart"></i> </h2>
            <!--
            <?php
            $query = "SELECT * FROM items ORDER BY item_id ASC";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                                                <div class ="col-md-3">
                                                    <form method ="post" action="cart.php?action=add&item_id=<?php echo $row["item_id"] ?>">
                                                        <div class ="product">
                                                            <img src ='<?php echo $row["images"]; ?>' class ="img-responsive">
                                                            <h5 class ="text-info"><?php echo $row['name']; ?></h5>
                                                            <h5 class ="text-danger"><?php echo $row['cost']; ?>$</h5>
                                                            <input type ="text" name="description" class="form-control" placeholder="Any specifications?">
                                                            <input type ="text" name="quantity" placeholder="Quantity" class="form-control">
                                                            <input type ="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                                            <input type ="hidden" name="hidden_price" value="<?php echo $row["cost"]; ?>">
                                                            
                                                            <input type="submit" name="add" style="margin-top: 5px;" class ="btn btn-success" value="Add to cart"> 
                                                        </div>
                                                    </form>
                                                </div>
                    <?php
                }
            }
            ?>
            -->
            <div style ="clear: both"></div>
            <h3 class ="title2"> Order cart details </h3>
            <div class="table-responsive">
                <table class ="table table-bordered">
                    <tr>
                        <th width ="30%"> Item Name</th>
                        <th width ="10%"> Quantity</th>
                        <th width ="13%"> Price details</th>
                        <th width ="17%"> Rest name</th>
                        <th width ="17%"> Rest id</th>
                        <th width ="17%">Description</th>
                        <th width ="17%"> Total price</th>

                        <th width ="45%"> Remove items</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION["cart"])) {
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <form action="checkout.php" method ="POST">
                                <tr>
                                    <td><input type="hidden" name="iname"><?php echo $value['item_name']; ?></input></td>
                                    <td><input type="hidden" name="iquantity"><?php echo $value['item_quantity']; ?></input></td>
                                    <td><input type="hidden" name="iprice">$<?php echo $value['product_price']; ?></input></td>
                                    <td><input type="hidden" name="rname"><?php echo $value['restaurant_name']; ?></input></td>
                                    <td><input type="hidden" name="rid"><?php echo $value['restaurant_id']; ?></input></td>
                                    <td><input type="hidden" name="desc"><?php
                                        if (isset($value['descript'])) {
                                            echo $value['descript'];
                                        } else {
                                            echo "None";
                                        }
                                        ?></input></td>
                                    <td><input type="hidden" name="icost">$<?php echo number_format(($value['item_quantity'] * $value['product_price']), 2, '.', ''); ?></input></td>
                                    <td><a href="cart.php?action=delete&item_id=<?php echo $value['product_id'] ?>"><span class = "text-danger" >Remove item</span></td>
                                </tr>
                                <?php
                                $total = $total + ($value['item_quantity'] * $value['product_price']);
                            }
                            ?>
                            <tr>
                                <td colspan ="3" align ="right">Total </td>
                                <th align ="right"><input type="hidden" name="Total">$<?php echo number_format($total, 2, '.', ''); ?></input></th>
                                <td colspan="3" rowspan="2" vertical-align="top">

                                    <input type="submit" name="add" style="margin-top: 3px;" class ="btn btn-primary" value="Checkout">
                        </form>
                        </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>

            <button type="submit" class="btn btn-warning center-block"><a href="searchRestaurant.php" style="color:white">Back to Selection</a></button>

        </div>
    </body>
</html>

