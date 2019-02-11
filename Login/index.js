function login(){
    


}

function register(){

    var email = document.getElementById("emailInput").submit();
    var password = document.getElementById("passwordInput").submit();

    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {

        //TODO: error handling
        var errorCode = error.code;
        var errorMessage = error.message;
      });

}