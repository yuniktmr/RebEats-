<html>
<head>

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
<link rel="stylesheet" href="form.css" type="text/css">
</head>

<body onload="onload()">
  <div class="body-content">
    <div class="module">
      <h1>Create an account</h1>
      <!--
      <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
      <!-->

        <div class="alert alert-error"></div>
        <input type="email" placeholder="Email" id="emailInput" />
        <input type="password" placeholder="Password" id="passwordInput" />
        <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" /></div>

        <select id="type" onchange="showFields()">
          <option selected disabled hidden value="">Select Account Type</option>
          <option value="customer">Customer</option>
          <option value="driver">Driver</option>
          <option value="restaurant">Restaurant Owner</option>
        </select>

          <!--div that contains the fields that are relevant to restaurant registration-->
        <div id="restFields">

            <input type="text" placeholder="Restaurant Name" id="restName" />
            <input type="text" placeholder="Resaurant Address" id="restAddress" />
            <input type="number" placeholder="Zipcode" id="restZipcode"/>
            <input type="tel" placeholder="Phone Number" id="restPNumber" />
            <input type="time" placeholder="Opening Time" id="restOpen"/>
            <input type="time" placeholder="Closing Time" id="restClose"/>

        </div>

        <!--div that contains the fields that are relevant to driver registration-->
        <div id="driverFields">

          <input type="text" placeholder="Name" id="driverName" />
          <input type="number" placeholder="Zipcode" id="driverZipcode" />

        </div>

        <!--div that contains the fields that are relevant to customer registration-->
        <div id="customerFields">

        <input type="text" placeholder="Name" id="customerName" />
        <input type="number" placeholder="Zipcode" id="customerZipcode" />

        </div>

        <input type="submit" value="Register" name="register" onclick = "register()" class="btn btn-block btn-primary" />



        <div class="link">Back to <a href="#" onclick="loader()">Sign in</a></div>
      
    </div>
  </div>
</body>
    <script src="Auth.js"></script>
</html>