<?php session_start(); ?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

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
    #orders{
        border-style: dotted;
        padding: 15px 15px;
    }
    .container{
        padding-left: 0px;
    }
    img{
        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px;  /* Rounded border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
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
        <p class="lead">Here is your order confirmation</p>
        <div class="jumbo" id="orders">
            <h6 style="font-family: 'Quicksand', sans-serif; ">Deliver to: <?php echo $_POST['inputName']; ?></h4>
                <h6 style="font-family: 'Quicksand', sans-serif;">Address: <?php echo $_POST['Address']; ?></h4>

                    <?php
                    $con = mysqli_connect("localhost", "root", "olemiss2019", "");
                    mysqli_select_db($con, "eatrebs");
                    if ($sql = mysqli_prepare($con, "INSERT INTO orders (cus_id, dr_id, rest_id, cost, address, rest_confirm, dr_confirm, fulfilled) VALUES ((SELECT cus_id FROM customers WHERE email=?), 1, ?, ? ,?,0,0,0)")) {
                        $sql->bind_param("sids", $_SESSION['email'], $_POST['rid'], $_SESSION['Total'], $_POST['Address']);
                        
                        $sql->execute();
//
//            echo $_POST['rid'] . "\n";
//            echo $_POST['icost'] . "\n";
           echo $_POST['icost'];
                        $query = "SELECT * FROM orders ORDER BY ord_id DESC LIMIT 1";
                        $result = mysqli_query($con, $query);
                        if ($result) {
//            var_dump($result);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="card bg-light mb-3"  style="max-width: 18rem; ">
                                   
                                    <?php
                                    $_SESSION['row'] = $row['ord_id'];
                                    foreach ($_SESSION["cart"] as $key => $value) {
                                        echo $_SESSION['row'];
                                        if ($sql = mysqli_prepare($con, "INSERT INTO order_items (ord_id, item_id, instructions) VALUES ( ? ,?, ?)")) {
                                            $sql->bind_param("iis", $_SESSION['row'], $value['product_id'], $value['descript']);
                                           
                                            $sql->execute();
                                            
                                            ?>
                                            <div class="card-header"><h5 class="card-title"><?php echo $value['item_name']; ?> </h5><?php
                                                if ($sql = mysqli_prepare($con, "SELECT DISTINCT i.images FROM items I inner join order_items It where I.item_id = ?")) {
                                                    $sql->bind_param("i", $value['product_id']);
                                                    $sql->execute();
                                                    $result = $sql->get_result();
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <img src="<?php echo $row['images']; ?>">

                                                        <div class="card-body">

                                                            <p class="card-text"><?php echo "Quantity: " . $value['item_quantity']; ?><br>
                                                            </p></div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                            } else {
                                                echo "Error";
                                            }
                                            ?>
                                        </div>

                                    <?php } ?>

                                </div>



                                <?php
                            }
                        } else {
                            echo mysqli_error($con);
                        }
                    } else {
                        echo "Error";
                    }
                    unset($_SESSION['row']);
                    unset($_SESSION['cart'])?>


                    </div>
                    </div>
