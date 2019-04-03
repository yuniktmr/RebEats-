<?php

    require_once "../Login-Linked/includes/dbh.php"; //loads $conn for connecting to the database

    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $open = $_POST['open'];
    $close = $_POST['close'];

    if($name != ""){
        $query = "UPDATE `restaurants` SET `rest_name` = '".$name."' WHERE email = '".$email."';";
        error_log($query);
        mysqli_query($conn, $query); 
    }if($address != ""){
        mysqli_query($conn, "UPDATE `restaurants` SET `address` = '".$address."' WHERE email = '".$email."';"); 
    }if($zipcode != ""){
        mysqli_query($conn, "UPDATE `restaurants` SET `zipcode` = '".$zipcode."' WHERE email = '".$email."';"); 
    }if($phone != ""){
        mysqli_query($conn, "UPDATE `restaurants` SET `pNumber` = '".$phone."' WHERE email = '".$email."';"); 
    }if($open != ""){
        mysqli_query($conn, "UPDATE `restaurants` SET `open` = '".$open."' WHERE email = '".$email."';"); 
    }if($close != ""){
        mysqli_query($conn, "UPDATE `restaurants` SET `close` = '".$close."' WHERE email = '".$email."';"); 
    }

    header("Location: index.php?email=".$email);

?>