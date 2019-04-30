<?php
$con = mysqli_connect("localhost","root","olemiss2019","");
mysqli_select_db($con, "eatrebs");



    if (isset($_POST['accept'])){
        if (mysqli_query($con,"UPDATE orders set orders.dr_confirm = 1 where orders.ord_id = {$_GET['id']}")){
            header('refresh:1; url="orderPool.php"');
        }else{
            echo "error";
        }
        
    }else{
        if (mysqli_query($con,"UPDATE orders set orders.dr_confirm = 2 where orders.ord_id = {$_GET['id']}")){
            header('refresh:1; url="orderPool.php"');
        }else{
            echo "error";
        }
    }





?>