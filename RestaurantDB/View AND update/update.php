<?php
    $con = mysqli_connect("127.0.0.1","root","toor");
    mysqli_select_db($con, 'eatrebs');
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['rname']) ? $_POST['rname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    if(isset($_POST['del']))
    {
        if ($sql = mysqli_prepare($con,"DELETE FROM restaurant  WHERE rest_id = ?")){
            $sql -> bind_param("s",$id);
            $sql -> execute ();
            $sql -> close();
            header('refresh:1; url="index.php"');
        }
        else{
            echo"No update";
        }
    }
    else{
        if ($sql = mysqli_prepare($con,"UPDATE restaurant SET rest_name = ?,email=?, address=? WHERE rest_id = ?")){
            $sql ->bind_param("ssss", $name, $email, $address, $id);
            $sql -> execute();
            $sql -> close();
            header('refresh:1; url="index.php"');
        }
        else{
            echo "No update";
        }
    }
    
    
    

?>



