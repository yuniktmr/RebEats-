<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <!--firebase-->
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
    <script>
        // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAB6FTyFRYTnZCjSjrmVbdBb81SaxcxiLs",
    authDomain: "mvp-authentication.firebaseapp.com",
    databaseURL: "https://mvp-authentication.firebaseio.com",
    projectId: "mvp-authentication",
    storageBucket: "mvp-authentication.appspot.com",
    messagingSenderId: "347871480306"
  };
  firebase.initializeApp(config);
</script>
    <!--firebase end-->
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Slabo+27px" rel="stylesheet">
</head>
<script src="index.js"></script>

<body onload="onload()">
    <div class="auth">
        <h1> Welcome To the Login Page</h1>
        <div class="buttons">
            <input type="email" placeholder="Email" id="emailInput" name="email">
            <input type="password" placeholder="Password" id=passwordInput>
            <button type = "submit" onclick="login()">Login </button>
         
            <button id="button2" > Not a member? <a href= "#" onclick="registerScreen()">Sign Up Now!</a></button>
            <p id="status"></p>
        </div>
    </div>
    
</body>

</html>
