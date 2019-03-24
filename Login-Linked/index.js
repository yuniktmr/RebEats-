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

        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                document.getElementById("status").innerHTML = ("Currently signed in as " + user.email);
                window.location.href = "../Restaurant Owner/index.html";
            }
          });

        // Move to a new location or you can do something else
        

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

function registerScreen(){
    window.location.href = "Form/index.php";
    
}

function onload(){
    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
}