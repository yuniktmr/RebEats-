/* global $ */
/* global window */
/* global document */
/*jslint browser: true*/
/*global $, jQuery, alert*/


//function called when register button is pressed
function register(){

    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;

    var type = document.getElementById("type").value;

    if(type === "restaurant"){

        var restName = document.getElementById("restName").value;
        var restAddress = document.getElementById("restAddress").value;
        var restZipcode = document.getElementById("restZipcode").value;
        var restPNumber = document.getElementById("restPNumber").value;
        var restOpen = document.getElementById("restOpen").value;
        var restClose = document.getElementById("restClose").value;

        if(restName === "" || restAddress === "" || restZipcode === ""
        || restPNumber === "" || restOpen === "" || restClose === ""){
            alert("Please input values for all fields")
            return
        }
        
    }else if(type === "driver"){

        var driverName = document.getElementById("driverName").value;
        var driverZipcode = document.getElementById("driverZipcode").value;

        if(driverName === "" || driverZipcode === ""){
            alert("Please input values for all fields")
            return
        }

    }else if(type === "customer"){

    }else{
        alert("Please select an account type")
        return 
    }

    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(){
        //runs if registration is successful
        alert("Account created successfully");
         //set delay timer
        //window.setTimeout(function(){

        // Move to a new location or you can do something else
        //window.location.href = "";

        //}, 5000);

        if(type === "restaurant"){

            window.location.href="../includes/register.php?email="+email+"&type="+type+"&restName="+restName+"&restAddress="+restAddress
            +"&restZipcode="+restZipcode+"&restPNumber="+restPNumber+"&restOpen="+restOpen+"&restClose="+restClose;

        }else if(type === "driver"){

            window.location.href="../includes/register.php?email="+email+"&type="+type+"&driverName="+driverName+"&driverZipcode="+driverZipcode;

        }else if(type === "customer"){

        }



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

        document.getElementById("driverFields").style.display = "none";
        //document.getElementById("customerFields").style.display = "none";
        document.getElementById("restFields").style.display = "initial";


    }else if(selected === "driver"){

        document.getElementById("restFields").style.display = "none";
        //document.getElementById("customerFields").style.display = "none";
        document.getElementById("driverFields").style.display = "initial";

    }else if(selected === "customer"){

        document.getElementById("restFields").style.display = "none";

    }

}

function onload(){

    document.getElementById("restFields").style.display = "none";
    document.getElementById("driverFields").style.display = "none";
    //document.getElementById("customerFields").style.display = "none";

}