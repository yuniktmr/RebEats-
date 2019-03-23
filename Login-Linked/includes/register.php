<?php

    include_once "dbh.php";

    $type = $_GET["type"];
    $email = $_GET["email"];

    if($type === "Customer")
        $sql = "INSERT INTO customers(email) VALUES ('$email');";
    elseif($type === "Driver"){
        $sql = "INSERT INTO drivers(email) VALUES ('$email');";
    }else{
        $sql = "INSERT INTO restaurants(email) VALUES ('$email');";
    }

        mysqli_query($conn, $sql);

        header("Location: ../index.php");

?>