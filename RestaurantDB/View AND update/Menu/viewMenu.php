<?php
    $con = mysqli_connect("localhost","root","toor");
    mysqli_select_db($con, "eatrebs");
    $sql = "SELECT items.* FROM items INNER JOIN restaurant ON restaurant.rest_id = items.rest_id Where items.rest_id = '{$_POST['iid']}' ";
    $menu = mysqli_query($con,$sql);
?>
<html>
    <head>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <table>
            <h1 align = "center">
                Menu Listings
            </h1>
            <thead>
                <tr>
                    
                    <th class = "center">Item ID</th>
                    <th class = "center">Item Name</th>
                    <th class = "center">Marked price</th>
                    <th class = "center">Production cost</th>
                    <th class = "center">Description</th>
                </tr>
            </thead>
            <tbody>
        <?php
        while ($row = mysqli_fetch_array($menu))
        {
            
            echo '<tr><form action="updateMenu.php" method="post">';
            echo"<input type=hidden name=id value='".$row['rest_id']."'></td>";
            echo "<td><input type = text name = \"item_id\"  value = '".$row['item_id']."'</td>";
            echo "<td><input type = text name = \"item_name\"  value = '".$row['name']."'</td>";
            echo "<td><input type = text name = \"item_cost\"  value = '".$row['cost']."'</td>";
            echo "<td><input type = text name = \"item_prod_cost\"  value = '".$row['prod_cost']."'</td>";
            echo "<td><input type = text name = \"item_description\"  value = '".$row['description']."'</td>";
            echo "<td><input type=submit value=\"updateMenu\">";
            echo '<td><Button btn btn-primary btn-lg pull-left name=delMenu>Delete</Button>';
            echo "</form></tr>";
            
            
        }
          ?>
            </tbody>
        </table>
    </body>
</html>