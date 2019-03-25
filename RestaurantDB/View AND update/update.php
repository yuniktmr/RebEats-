<?php
    $con = mysqli_connect("127.0.0.1","root","toor");
    mysqli_select_db($con, 'eatrebs');
    $sql = "UPDATE restaurant SET rest_name = '$_POST[rname]',email='$_POST[email]', address='$_POST[address]' WHERE rest_id = '$_POST[id]'";
    
    mysqli_query($con,$sql);
    if (mysqli_query($con, $sql)){
        header('refresh:1; url="index.php"');
    }else{
        echo "No update";
    }
    
    

?>
