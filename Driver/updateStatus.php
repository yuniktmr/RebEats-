<?php
$con = mysqli_connect("localhost","root","olemiss2019","");
mysqli_select_db($con, "eatrebs");
$query = mysqli_query($con,"UPDATE orders set orders.dr_confirm = 1 where orders.ord_id = {$_GET['id']}");
    if (isset($_POST['accept'])){
        if ($query){
            echo "done";
        }else{
            echo "error";
        }
        
    }else{
        echo "rejected";
    }





?>