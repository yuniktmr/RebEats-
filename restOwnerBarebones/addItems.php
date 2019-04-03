<?php

    require_once "../Login-Linked/includes/dbh.php";

    $email = $_POST['email'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if($name != "" || $price != "" || $description != ""){

        $query = "INSERT INTO `items` (rest_id, cost, prod_cost, `name`, `description`)
        VALUES ((SELECT `rest_id` FROM `restaurants` WHERE `email` = '".$email."'), ".$price.", 0, '".$name."', '".$description."');";

        error_log($query, 4);

        mysqli_query($conn, $query);

    }

    header("Location: index.php?email=".$email);

?>