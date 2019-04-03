<!DOCTYPE html>
<html lang="en">

<head></head>

    <body>

        <?php

            require_once "../Login-Linked/includes/dbh.php"; //loads $conn for connecting to the database

            $email = $_GET['email'];

            error_log($email, 4);

            $resultItems = mysqli_query($conn, "SELECT * FROM items WHERE rest_id = (SELECT rest_id FROM restaurants WHERE email = '$email');");

            $itemsArray = [];

            if($resultItems->num_rows > 0){

                while($row = $resultItems->fetch_assoc()){

                    array_push($itemsArray, $row);

            }

            $deletedItem = "";

            foreach ($resultItems as $item){

                echo "
                    <div>
                    <ul>
                    <li>".$item['name']."</li>
                    <li>$".$item['cost']."</li>
                    <li>".$item['description']."</li>
                    </ul>
                    <input type=submit id=".$item['item_id']." onclick=altDeleteItem('".$email."',this.id) value='Delete Item' />
                    </div>";
                }

            }

            echo "
            <hr />
            <form method=POST action=addItems.php>
            <input name='email' style='display: none' value='".$email."' />
            <input name='name' type=text placeholder=name style='display: block' />
            <input name='price' type=number placeholder=price style='display: block' />
            <textarea name='description' rows=4 cols=10 style='display: block'>Description</textarea>
            <input type=submit value='Add Item' style='display: block' />
            </form>";

        ?>
        
        

    <script src="script.js"></script>
    </body>

</html>