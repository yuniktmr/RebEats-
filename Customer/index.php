<?php 
    session_start();
    $con = mysqli_connect("localhost", "root", "olemiss2019","eatrebs");
     
    if(isset($_POST['add'])){
        if(isset($_SESSION['index'])){
            $item_array_id = array_column($_SESSION['index'], "product_id");
            if(!in_array($_GET['item_id'],$item_array_id)){
                $count = count($_SESSION['index']);
                $item_array = array(
                    'product_id' => $_GET['item_id'],
                    'item_name' => $_POST['hidden_name'],
                    'product_price' => $_POST['hidden_price'],
                    'item_quantity' => $_POST['quantity'],
                );
                $_SESSION['index'][$count] = $item_array;
                echo'<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Product already in the cart")</script>';
                echo '<script>window.location="index.php"</script>';
            }
    }else{
        $item_array = array(
            'product_id' => $_GET['item_id'],
                    'item_name' => $_POST['hidden_name'],
                    'product_price' => $_POST['hidden_price'],
                    'item_quantity' => $_POST['quantity'],
        );
        $_SESSION['index'][0] = $item_array;
    }
    }
    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION['index'] as $keys => $value){
                if ($value['product_id'] == $_GET['item_id']){
                    unset($_SESSION['index'][$keys]);
                   
                    echo'<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>
<html>
    <head>
        <title>crud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            body{
                font-family: 'Raleway', sans-serif;
            }
            .product{
                border: 1px solid #eaeaec;
                margin: -1px 19px 3px -1px;
                padding: 10px;
                text-align: center;
                background-color: #efefef;
            }
            table, th ,tr{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;
                  
            }
            .title2{
            text-align: center;
            color: #f40019;
            background-color: #DDEBFF;
            padding: 2%;
            }
            h2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;
                    
            }
            table th{
                background-color: #efefef;
            }
        </style>
    </head>
    <body>
        <div class ="container" style="width:65%">
            <h2> Shopping Cart <i class="fas fa-shopping-cart"></i> </h2>
            
             <?php
                $query= "SELECT * FROM items ORDER BY item_id ASC";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_array($result)){ 
                       
                        
                    
                    ?>
                <div class ="col-md-3">
                    <form method ="post" action="index.php?action=add&item_id=<?php echo $row["item_id"]?>">
                        <div class ="product">
                            <img src ='<?php echo $row["images"];?>' class ="img-responsive">
                            <h5 class ="text-info"><?php echo $row['name'];?></h5>
                            <h5 class ="text-danger"><?php echo $row['cost'];?>$</h5>
                            <input type ="text" name="description" class="form-control" placeholder="Any specifications?">
                            <input type ="text" name="quantity" placeholder="Quantity" class="form-control">
                            <input type ="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
                            <input type ="hidden" name="hidden_price" value="<?php echo $row["cost"];?>">
                            
                            <input type="submit" name="add" style="margin-top: 5px;" class ="btn btn-success" value="Add to cart"> 
                        </div>
                    </form>
                </div>
                <?php
                    }
                }
                ?>
                
                <div style ="clear: both"></div>
                <h3 class ="title2"> Order cart details </h3>
                <div class="table-responsive">
                    <table class ="table table-bordered">
                    <tr>
                        <th width ="30%"> Item Name</th>
                        <th width ="10%"> Quantity</th>
                        <th width ="13%"> Price details</th>
                        <th width ="17%"> Total price</th>
                        <th width ="45%"> Remove items</th>
                    </tr>
                    <?php
                        if(!empty ($_SESSION["index"])){
                            $total = 0;
                            foreach ($_SESSION["index"] as $key => $value){
                        
                    ?>
                    <tr>
                        <td><?php echo $value['item_name']; ?></td>
                        <td><?php echo $value['item_quantity']; ?></td>
                        <td>$<?php echo $value['product_price']; ?></td>
                        <td>$<?php echo number_format (($value['item_quantity'] * $value['product_price']), 2,'.','' );?></td>
                        <td><a href="index.php?action=delete&item_id=<?php echo $value['product_id']?>"><span class = "text-danger" >Remove item</span></td>
                    </tr>
                    <?php 
                        $total = $total + ($value['item_quantity'] * $value['product_price']);
                            }
                        
                        ?>
                    <tr>
                        <td colspan ="3" align ="right">Total </td>
                        <th align ="right">$<?php echo number_format($total, 2 , '.', '');?></th>
                        <td colspan="3" rowspan="2" vertical-align="top"><input type="submit" name="add" style="margin-top: 3px;" class ="btn btn-primary" value="Checkout"></td>
                        <td></td>
                    </tr>
                        <?php } ?>
                        </table>
                </div>
        </div>
    </body>
</html>

