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
    $resultCustomer = mysqli_query($conn, $sqlCustomer);

    
    if ($resultRest->num_rows === 1) {  //if the email is found in restaurants
        //header("Location: ../../Menu-master/index.php?email=".$email);
        header("Location: ../../restOwnerBarebones/index.php?email=".$email);
        exit();
    }elseif($resultCustomer->num_rows === 1){ //if the email is found in customers
        //I'm doing it this way instead of using php's header function because when I try to use
        //header it sometimes crashes the server and idk why
        echo "<script>window.location.href=\"../../Customer/index.php?email=".$email."\"</script>";
        //header("Location: ../../User_Page/user.html?email=".$email);
        exit();
    }else{
        header("Location: ../index.php");
        exit();
    }

?>