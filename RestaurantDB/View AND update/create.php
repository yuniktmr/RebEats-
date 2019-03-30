<?php
    $con = mysqli_connect("localhost","root","toor");
    mysqli_select_db($con, 'eatrebs');
    $name = isset($_POST['rname2']) ? $_POST['rname2'] : '';
    $email = isset($_POST['email2']) ? $_POST['email2'] : '';
    $address = isset($_POST['address2']) ? $_POST['address2'] : '';
    if ($sql = mysqli_prepare($con, "INSERT INTO restaurant (rest_name, email, address) VALUES (?, ?, ?)")){
        $sql ->bind_param("sss", $name, $email, $address);
        $sql -> execute();
        $sql -> close();
                
        header('refresh:1; url="index.php"');
    }
    else{
        echo"No update";
    }
?>