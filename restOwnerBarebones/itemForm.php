<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="itemFormCss.css">

    <title>Form</title>
  </head>
  <body style='background-color: #1D3557'>
  
  <?php
    $email = $_GET['email'];
  ?>
    
    <?php echo "
    <form method=POST action=addItems.php id=form>
        <div class='form-group'>
        <label>Item Name</label>
        <input name='email' style='display: none' value='".$email."'>
        <input type='text' name='name' class='form-control' placeholder='Enter Name'>
        </div>
        <div class='form-group'>
        <label>Item Price</label>
        <input type='number' name='price' class='form-control' placeholder='Enter Price'>
        </div>
        <div class='form-group'>
        <label>Item Description</label>
        <input type='text' name='description' class='form-control' placeholder='Enter Description'>
        </div>
        <button type='submit' class='btn' style='background-color: #FAFBFC; display: inline; margin-top: 20px'>Add Item</button>
        <button class='btn' style='background-color: #FAFBFC; color: black; display: inline; margin-top: 20px'><a href='index.php?email=".$email."' style='background-color: #FAFBFC; color: black; display: inline'>Finish Adding</a></button>
        </form>";?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>