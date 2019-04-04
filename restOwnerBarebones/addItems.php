<?php

    require_once "../Login-Linked/includes/dbh.php";

    $email = $_POST['email'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if($name != "" && $price != "" && $description != ""){

        $query = "INSERT INTO `items` (rest_id, cost, `name`, `description`)
        VALUES ((SELECT `rest_id` FROM `restaurants` WHERE `email` = '".$email."'), ".$price.", '".$name."', '".$description."');";

        mysqli_query($conn, $query);

    }

    header("Location: itemForm.php?email=".$email);

?>