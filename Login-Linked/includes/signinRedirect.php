<?php

    require_once "dbh.php"; //loads $conn for connecting to the database

    $email = $_GET['email']; //email of currently signed in user

    //variables that gets the record of the currently signed in user
    // only one of these should result in a record and there shouldn't be more than 1 record
    $sqlRest = "SELECT * FROM restaurants WHERE email = '$email'";
    $sqlDriver = "SELECT * FROM drivers WHERE email = '$email'";
    $sqlCustomer = "SELECT * FROM customers WHERE email = '$email'";

    //makes query for $sqlRest
    $resultRest = mysqli_query($conn, $sqlRest);

    
    if ($resultRest->num_rows === 1) {  //if the email is found in restaurants
        header("Location: ../../Menu-master/index.php?email=".$email);
        exit();
    }else{  //this code will later redirect to customer/driver respectivly but now it just returns to login
        header("Location: ../index.php");
        exit();
    }

?>