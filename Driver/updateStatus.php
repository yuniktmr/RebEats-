<?php
$con = mysqli_connect("localhost","root","olemiss2019","");
mysqli_select_db($con, "eatrebs");
$query1 = mysqli_query($con,"UPDATE orders set orders.dr_confirm = 1 where orders.ord_id = {$_GET['id']}");
$query2 = mysqli_query($con,"UPDATE orders set orders.dr_confirm = 2 where orders.ord_id = {$_GET['id']}");
    if (isset($_POST['accept'])){
        if ($query1){
            echo "done";
        }else{
            echo "error";
        }
        
    }else{
        if ($query2){
            echo "deletedone";
        }else{
            echo "error";
        }
    }





?>