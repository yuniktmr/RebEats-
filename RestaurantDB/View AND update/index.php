<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            <tr>
            <th>Restaurant Name</th>
            <th>Email</th>
            <th>Address</th>
            </tr>
        </table>
        <?php
        while ($row = mysqli_fetch_array($records))
        {
            
            echo '<tr><form action="update.php" method="post">';
            echo"<input type=hidden name=id value='".$row['rest_id']."'></td>";
            echo "<td><input type = text name = rname  value = '".$row['rest_name']."'</td>";
            echo "<td><input type = text name = email  value = '".$row['email']."'</td>";
            echo "<td><input type = text name = address  value = '".$row['address']."'</td>";
            echo"<td><input type=submit>";
            echo "</form></tr>";
            
        }
        
        ?>
    </body>
</html>
