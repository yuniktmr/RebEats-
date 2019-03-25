<?php

    
    require_once "dbh.php"; //loads $conn for connecting to the database

    $type = $_GET["type"]; // variable for account type (rest, driver, customer)
    $email = $_GET["email"]; //email variable

    //if the account type is customer, a new record will be created in the customer table
    if($type === "customer"){

        $customerName = $_GET["customerName"];
        $customerZipcode = $_GET["customerZipcode"];

        //MySQL statement that adds the record
        $sql = "INSERT INTO customers(email, name, zipcode)
        VALUES ('$email', '$customerName', '$customerZipcode');";

        //sends $sql as a query to the database
        mysqli_query($conn, $sql);

    //if the account type is driver, a new record will be created in the driver table
    }elseif($type === "driver"){

        $driverName = $_GET["driverName"];
        $driverZipcode = $_GET["driverZipcode"];

        //MySQL statement that adds the record
        $sql = "INSERT INTO drivers(email, name, zipcode)
        VALUES ('$email', '$driverName', '$driverZipcode');";

        //sends $sql as a query to the database
        mysqli_query($conn, $sql);

    //if the account type is restaurant, a new record will be created in the restaurant table
    }elseif($type === "restaurant"){

        $restName = $_GET["restName"];
        $restAddress = $_GET["restAddress"];
        $restZipcode = $_GET["restZipcode"];
        $restPNumber = $_GET["restPNumber"];
        $restOpen = $_GET["restOpen"];
        $restClose = $_GET["restClose"];

        //MySQL Statement that adds the record
        $sql = "INSERT INTO restaurants(email, rest_name, address, pNumber, zipcode, open, close)
        VALUES ('$email', '$restName', '$restAddress', '$restPNumber', '$restZipcode', '$restOpen', '$restClose');";

        //sends $sql as a qeury to the database
        mysqli_query($conn, $sql);
    }

        //redirects to the login page again
        header("Location: ../index.php");

?>