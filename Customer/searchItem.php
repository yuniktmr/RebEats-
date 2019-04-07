<?php
    
        function displayItems(){
            $con = mysqli_connect("localhost", "root","olemiss2019","");
            $result = mysqli_select_db($con, "eatrebs");
            if ($sql = mysqli_prepare($con, "SELECT R.rest_name, I.name, I.images,description, I.cost FROM restaurants AS R INNER JOIN items AS I where I.name REGEXP concat('^',?) AND R.rest_id = I.rest_id" )){
                $sql ->bind_param("s", $_POST['isearch']); 
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
                    </div>
                   <div class="card-footer">
                <small class="text-muted">Restaurant name: <?php echo $row['rest_name'];?></small>
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
        } 
?>

 
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
        width: 25%;
        height: 25%;
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
            
          
          <a class="dropdown-item" href="searchRestaurant.php">Restaurant</a>
          
          
        </div>
      </li>
      
    </ul>
      <form class="form-inline my-2 my-lg-0" action="searchItem.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <div class="jumbotron">
  <h1 class="display-4">RebEats!</h1>
  <p class="lead">Founded in 2019 by a group of five industrious individuals, RebEats allows you to choose from a wide variety of items from multiple restaurants under our wing.</p>
  <p>Not only that, we ensure the food you order gets delivered
  to your doorsteps at a very reasonable price almost instantaneously.</p>
  <hr class="my-4">
  <p>Search for Food items</p>
    <form class="form-inline my-2 my-lg-0" action="searchItem.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="isearch" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="itemSearch">Search</button>
    </form>
  <br>
  <?php 
    if (isset($_POST['itemSearch'])){
        displayItems();
    }
  ?>
  
</div>
    </body>
</html>

