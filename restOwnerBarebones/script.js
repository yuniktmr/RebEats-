
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

function showAlert(){

  var name = document.getElementById('name').value;
  var price = document.getElementById('price').value;
  var description = document.getElementById('description').value;

  if(name !== "" && price !== "" && description !== ""){
    alert(name+" was added");
  }else{
    alert("Please enter all fields");
  }

}