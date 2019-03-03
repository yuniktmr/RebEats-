/* global $ */
/* global window */
/* global document */
/*jslint browser: true*/
/*global $, jQuery, alert*/


//function called when login button is pressed
function login(){

    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;
    
    firebase.auth().signInWithEmailAndPassword(email, password).then(function(){
        //runs if sign in is successful

        alert("Login Successful");

        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                document.getElementById("status").innerHTML = ("Currently signed in as " + user.email);
            }
          });
        window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "Home/index.html";

        }, 5000);

    }).catch(function(error) {
        //runs if sign in fails

        var errorCode = error.code

        if(errorCode === "auth/invalid-email" || errorCode === "auth/user-not-found" || errorCode === "auth/wrong-password") { //if the users input is wrong
            alert("The entered email or password is wrong");
        }else if(errorCode === "auth/user-disabled"){ //if the account is disabled
            alert("That account is currently disabled");
        }else{                                       //if some unaccounted exception happens
            alert("Something went wrong. Sign in failed");
        }
      });

}

//function called when register button is pressed
function register(){

    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;

    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(){
        //runs if registration is successful
        alert("Account created successfully")
    }).catch(function(error) {
        //runs if registration is not successful

        var errorCode = error.code;

        if(errorCode === "auth/email-already-in-use"){ //if there's already an account with the given email
            alert("There is already an account assoicated with that email");
        }else if(errorCode === "auth/invalid-email"){ //if the input doesn't fit the format of an email
            alert("That email is not valid");
        }else if(errorCode === "auth/weak-password"){ //if the password isn't 6 characters long
            alert("Your password must be at least 6 characters");
        }else {                                         //if some unaccounted exception happens
            alert("Something Went Wrong. Registration Failed");
        }
      });

}
function registerScreen(){
    window.location.href = "Form/index.html";
    
}