<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="popup.css">
        <link rel="stylesheet" href="PopupSearch.css">
        <script src="popup.js"></script>
        <script src="PopupSearch.js"></script>
        <meta charset="UTF-8">
        <title>Owner's view</title>
    </head>
    <body>
        <?php
        //Connect to mysql db
        $con = mysqli_connect('127.0.0.1','root','toor');
        //select database
        mysqli_select_db($con,'eatrebs');
        //Select query
        $sql = "SELECT * FROM restaurant";
        //Execute query
        $records = mysqli_query($con,$sql);
            
        ?>
        <table>
            <h1 align="left">
                Restaurant Listings
                <button class="btn">
                    <i class="fa fa-bars"></i>
                </button>
            </h1>
            <Hr>
            <div id="Listingsblock">
            <thead>
            <tr>
            <div id="Listing_Labels">
            <th class="text-center">Restaurant Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            </tr>
            </div>
            </thead>
            <tbody>
        <?php
        while ($row = mysqli_fetch_array($records))
        {
            
            echo '<tr><form action="update.php" method="post">';
            echo"<input type=hidden name=id value='".$row['rest_id']."'></td>";
            echo "<td><input type = text name = \"rname\"  value = '".$row['rest_name']."'</td>";
            echo "<td><input type = text name = \"email\"  value = '".$row['email']."'</td>";
            echo "<td><input type = text name = \"address\"  value = '".$row['address']."'</td>";
            echo"<td><input type=submit value=\"Update\">";
            echo'<td><Button btn btn-primary btn-lg pull-left name=del>Delete</Button>';
            echo "</form>";
            echo '<form action="Menu/viewMenu.php" method="post">';
            echo"<td><input type=submit value=\"View Menu\" name=viewMenu>";
            echo'</form></tr>';
          
        }
        $a = mysqli_num_rows($records);
        if($a==0){
            echo'<h1>No Records Available</h1>';
            
        }
        
        
        ?>
            </tbody>
            </table>
        <hr>
        <hr>
        </div>
        <!--Insert Records-->
        <h1 align="left">
            Create new Listing
            <button type="button" class="btn btn-default btn-sm" onclick="openForm()">
                <span class="glyphicon glyphicon-plus-sign"></span> Plus
            </button>
        </h1>
        <br>
        <!--create entry popup-->
        
        
          

        

        <div class="form-popup" id="myForm">
            <form action="create.php" class="form-container" method="post">
            <h1>Register</h1>

            <label for="rname2"><b>Restaurant Name</b></label>
            <input type="text" placeholder="Enter Restaurant Name" name="rname2" required>

            <label for="email2"><b>Email</b></label>
            <input type="text" placeholder="Enter email" name="email2" required>
            
            <label for="address2"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address2" required>

            <button type="submit" class="btn">Register</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
            
        </div>


                
                
                
                
            
        
        
        <hr>
        <hr>
        <!--Search Zone-->
        <h1 align="left">Search Listing
            <button type="button" class="btn btn-default btn-sm" onclick="openFormx()">
                <span class="glyphicon glyphicon-plus-sign"></span> Search
            </button>
        </h1>
            <div class="form-popupx" id="myFormx">
            <form action="update.php" class="form-containerx" method="post">
            <h1>Search</h1>

            <label for="rname3"><b>Restaurant</b></label>
            <input type="text" placeholder="Search by Restaurant Name" name="rname3" required>

            <label for="email3"><b>Email</b></label>
            <input type="text" placeholder="Search by email" name="email3" required>
            
            <label for="address3"><b>Address</b></label>
            <input type="text" placeholder="Search by Address" name="address3" required>
            
            <br>
            <div class="search-buttons">
            <<h4>Search by</h4>
            <select><option>ID</option>
            <option>Restaurant Name</option>
            <option>Email</option>
            <option>Address</option></select>
            
            </div>
            <Br>
            <button type="submit" class="btn">Search</button>
            <button type="button" class="btn cancel" onclick="closeFormx()">Close</button>
            
            
            </form>
            
            </div>

            
       
    </body>
</html>



