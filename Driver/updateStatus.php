<?php
$con = mysqli_connect("localhost","root","olemiss2019","");
mysqli_select_db($con, "eatrebs");
// $query = mysqli_query($con,"UPDATE")
    if (isset($_POST['accept'])){
        echo "Accepted";
    }else{
        echo "rejected";
    }





?>