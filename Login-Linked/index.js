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

        //if a user is signed in, it will redirect to the php page that handles which page to redirect to
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                window.location.href = "./includes/signinRedirect.php?email="+user.email;
            }
          });   

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

//sets sign in state persistence to local (won't sign out until the user explicitely does so)
function onload(){
    
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          console.log(user.email)
        }else {
          console.log("no user signed in")
        }
    });
}