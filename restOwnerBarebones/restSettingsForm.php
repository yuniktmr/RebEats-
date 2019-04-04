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
    
    <form method=POST action=changeSettings.php>
        <?php echo "<input name='email' style='display: none' value='".$email."' />"; ?>
        <label>Restaurant Name</label>
        <input type=text class='form-control' placeholder='Enter Name' name=name />
        <label>Restaurant Address</label>
        <input type=text class='form-control' placeholder='Enter Address' name=address />
        <label>Zipcode</label>
        <input type=number class='form-control' placeholder='Enter Zipcode' name=zipcode style='display: block' />
        <label>Phone Number</label>
        <input type=tel class='form-control' placeholder='Enter Number' name=phone style='display: block' />
        <label>Opening Time</label>
        <input type='time' class='form-control' name=open style='display: block' />
        <label>Closing Time</label>
        <input type='time' class='form-control' name=close style='display: block' />
        <button class=btn type=submit style='background-color: #FAFBFC; color: black; margin-top: 20px'>Confirm Changes</button>
    </form>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>