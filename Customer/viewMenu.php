


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Custom</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      

    </head>
    <style>
        .navbar-nav > li{
            padding-left:30px;
            padding-right:30px;
}
.card-img-top {
        padding-left: 3vh;
        width: 35vh;
        height: 25vh;
        object-fit: cover;
        }
    </style>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"><img src="rebeats2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Order Cart</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Search for
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            
          
          <a class="dropdown-item" href="searchItem.php">Food</a>
          
          
        </div>
      </li>
      
    </ul>
      <form class="form-inline my-2 my-lg-0" action="searchRestaurant.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <br>
        
        
      <?php
            session_start();
            
            $con = mysqli_connect("localhost", "root","olemiss2019","");
            $result = mysqli_select_db($con, "eatrebs");
            
            if ($sql = mysqli_prepare($con, "SELECT I.item_id,R.rest_name, I.name, I.images,description, I.cost FROM restaurants AS R INNER JOIN items AS I where R.rest_name REGEXP concat('^',?) AND R.rest_id = I.rest_id" )){
                $sql ->bind_param("s", $_GET['name']); 
                $sql -> execute();
                $result = $sql ->get_result();
                $A = $result -> num_rows;
                if ($A>0)   
                {
                while($row = $result->fetch_array()){
?>  
              <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src='<?php echo $row["images"];?>' alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name'];?></h5>
                    <p class="card-text"><?php echo "$".$row['cost'];?></p>
                    <p class="card-text"><?php echo $row['description'];?></p>
                    <div class="form-group">
                    <form method ="post" action='cart.php?action=add&item_id=<?php echo $row["item_id"]?>'>
                    
                        <input type ="text" name="description" class="form-control" placeholder="Any specifications?">
                        <input type ="text" name="quantity" placeholder="Quantity" class="form-control">
                        <input type ="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
                        <input type ="hidden" name="rest_name" value="<?php echo $_GET['name'];?>">
                         <input type ="hidden" name="hidden_price" value="<?php echo $row["cost"];?>">
                         <input type="submit" name="add" style="margin-top: 5px;" class ="btn btn-success" value="Add to cart"> 
                        <button type="submit" style="margin-top: 5px;" class="btn btn-warning center-block"><a href="javascript:history.go(-1)" style="color:white">Back to Listings</a></button>
                    </form>
                         
                    </div>
                    </div>
                   <div class="card-footer">
                <small class="text-muted">Restaurant Name: <?php echo $row['rest_name'];?></small>
                </div>
           </div>
  
        </div>

<?php          
                 }
              
                }else{
                    echo "<br><br>";
                    echo "<h3>No search results corresponding to your entry</h3>";
                }
            }else{
                    echo("Error");
            }  
        
?>
