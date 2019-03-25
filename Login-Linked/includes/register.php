<?php

    require_once "dbh.php";

    $type = $_GET["type"];
    $email = $_GET["email"];

    if($type === "customer"){
        $sql = "INSERT INTO customers(email) VALUES ('$email');";
    }elseif($type === "driver"){

        $driverName = $_GET["driverName"];
        $driverZipcode = $_GET["driverZipcode"];

        $sql = "INSERT INTO drivers(email, name, zipcode)
        VALUES ('$email', '$driverName', '$driverZipcode');";

        mysqli_query($conn, $sql);

    }elseif($type === "restaurant"){

        $restName = $_GET["restName"];
        $restAddress = $_GET["restAddress"];
        $restZipcode = $_GET["restZipcode"];
        $restPNumber = $_GET["restPNumber"];
        $restOpen = $_GET["restOpen"];
        $restClose = $_GET["restClose"];

        //MySQL Statement that adds the restaurant user to the database
        $sql = "INSERT INTO restaurants(email, rest_name, address, pNumber, zipcode, open, close)
        VALUES ('$email', '$restName', '$restAddress', '$restPNumber', '$restZipcode', '$restOpen', '$restClose');";

        mysqli_query($conn, $sql);
    }

        header("Location: ../index.php");

?>