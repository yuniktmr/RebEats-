<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="itemFormCss.css">

    <title>Form</title>
  </head>
  <body style='background-color: #1D3557'>
  
  <?php

    require_once "../Login-Linked/includes/dbh.php";

    $email = $_GET['email'];

    echo "

    <H2 style='color: #FAFBFC; text-align: center; padding-top: 30px;'> Pending Orders </h2>

    <form method=POST action=orderView.php>";
    

    $query = "SELECT * FROM orders WHERE rest_id=(SELECT rest_id FROM restaurants WHERE email='".$email."') AND rest_confirm = FALSE;";

    error_log($query);

    $orders = mysqli_query($conn, $query);

    while($row = $orders->fetch_assoc()){

        echo "<input type=hidden value='".$row['ord_id']."' />";
        
        $customerQuery = "SELECT * FROM customers WHERE cus_id='".$row['cus_id']."';";
        $itemQuery = "SELECT * FROM order_items WHERE ord_id='".$row['ord_id']."';";

        $customer = mysqli_query($conn, $customerQuery)->fetch_assoc();
        $items = mysqli_query($conn, $itemQuery);

        echo "<div class='card' style='width: 1875px; margin-left: 20px; margin-bottom: 20px; text-align: center'>
        <div class='card-body'>
            <h4 class='card-title'>Submitted by ".$customer['name']." </h5>
            <h5 class='card-subtitle mb-2 text-muted'>".$customer['address']."</h6>
            <p class='card-text'>
            ";
            while($itemRow = $items->fetch_assoc()){

                $itemName = mysqli_query($conn, "SELECT name FROM items WHERE item_id='".$itemRow['item_id']."';")->fetch_assoc()['name'];

                echo "<h4>".$itemName.": ".$itemRow['instructions']."</h4>";
            }

            echo "
            </p>
            <a href=# class='card-link' onclick='submit()'>Accept Order</a>
        </div>
        </div>";
        
    }
        
    

    echo "</form>";
        
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src='script.js'></script>
    
  </body>
</html>