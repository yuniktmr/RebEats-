
function logout(){

    var user = firebase.auth().currentUser;

    console.log(user.email)

    firebase.auth().signOut().then(function() {
        
        window.location.href="../../index.php"

      }, function(error) {
        // An error happened.
      });

}

function submit(){
    document.getElementById("form").submit();
}