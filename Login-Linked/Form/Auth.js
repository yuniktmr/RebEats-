/* global $ */
/* global window */
/* global document */
/*jslint browser: true*/
/*global $, jQuery, alert*/


//function called when register button is pressed
function register(){

    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;

    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(){
        //runs if registration is successful
        alert("Account created successfully");
         //set delay timer
        //window.setTimeout(function(){

        // Move to a new location or you can do something else
        //window.location.href = "";

        //}, 5000);

        

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
function loader(){
    
     window.location.href = "../index.html";
}

function showFields(){

    let selected = document.getElementById("type").value

    if(selected === "restaurant"){

        //document.getElementById("driverFields").style.display = "none";
        //document.getElementById("customerFields").style.display = "none";
        document.getElementById("restFields").style.display = "initial";


    }else if(selected === "driver"){

        document.getElementById("restFields").style.display = "none";

    }else if(selected === "customer"){

        document.getElementById("restFields").style.display = "none";

    }

}

function onload(){

    document.getElementById("restFields").style.display = "none";
    //document.getElementById("driverFields").style.display = "none";
    //document.getElementById("customerFields").style.display = "none";

}