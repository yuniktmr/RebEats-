<?php

    require_once "../Login-Linked/includes/dbh.php"; //loads $conn for connecting to the database

    $email = $_GET['email'];

    foreach($_GET as $key => $value){

        if($key != "email"){

            mysqli_query($conn, "DELETE FROM `items` WHERE item_id = ".$value.";");

        }

    }

    header("Location: index.php?email=".$email);

?>