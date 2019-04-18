<?php

require_once "../Login-Linked/includes/dbh.php";

if(isset($_POST['itemID'])){

    $query = "UPDATE `items` SET `name` = '".$_POST['name']."', `cost` = '".$_POST['cost']."', `description` = '".$_POST['description']."' WHERE `item_id` = '".$_POST['itemID']."';";

    error_log($query);

    mysqli_query($conn, $query);

    header("Location: index.php?email=".$_POST['email']);
    exit();

}else{



    echo "<!doctype html>
    <html lang='en'>
    <head>
        <!-- Required meta tags -->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
        <link rel='stylesheet' href='itemFormCss.css'>

        <title>Form</title>
    </head>
    <body style='background-color: #1D3557'>";
  
    $email = $_GET['email'];

    
        $resultItems = mysqli_query($conn, "SELECT * FROM items WHERE item_id = '".$_GET['item']."';");

        $row = $resultItems->fetch_assoc();
        
        echo "

            <form method=POST action=editItem.php>
                <div class='form-group'>
                <label>Item Name</label>
                <input type=hidden name=itemID value=".$_GET['item'].">
                <input name='email' style='display: none' value='".$email."'>
                <input type='text' name='name' class='form-control' value='".$row['name']."' placeholder='Enter Name'>
                </div>
                <div class='form-group'>
                <label>Item Price</label>
                <input type='number' name='cost' class='form-control' value='".$row['cost']."' placeholder='Enter Price'>
                </div>
                <div class='form-group'>
                <label>Item Description</label>
                <input type='text' name='description' class='form-control' value='".$row['description']."' placeholder='Enter Description'>
                </div>
                <button type='submit' class='btn' style='background-color: #FAFBFC; display: inline; margin-top: 20px'>Change Item</button>
                </form>";

    }
        
        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>