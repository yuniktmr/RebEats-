<?php
    $con = mysqli_connect("localhost","root","toor");
    mysqli_select_db($con, 'eatrebs');
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $item_id = isset($_POST['item_id'])? $_POST['item_id']:'';
    $name = isset($_POST['item_name']) ? $_POST['item_name'] : '';
    $price = isset($_POST['item_cost']) ? $_POST['item_cost'] : '';
    $prod_cost = isset($_POST['item_prod_cost']) ? $_POST['item_prod_cost'] : '';
    $description = isset($_POST['item_description']) ? $_POST['item_description'] : '';
    if(isset($_POST['delMenu'])){
        if ($sql = mysqli_prepare($con,"DELETE FROM items WHERE item_id = ?")){
            $sql -> bind_param("s",$item_id);
            $sql -> execute ();
            $sql -> close();
            header('refresh:1; url="viewMenu.php"');
        }
        else{
            echo"No update";
        }
    }
    else{
        if ($sql = mysqli_prepare($con,"UPDATE items SET item_id= ?,name=?, cost=?, prod_cost = ?, description=? WHERE rest_id = ?")){
            $sql ->bind_param("ssddss", $item_id, $name, $price,$prod_cost, $description,$id );
            $sql -> execute();
            $sql -> close();
            header('refresh:1; url="viewMenu.php"');
        }
        else{
            echo "No update";
        }
    }
    
    
    

?>



