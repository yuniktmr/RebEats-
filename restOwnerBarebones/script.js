
var itemIDs = []

function deleteItem(itemID){

    this.itemIDs.push(itemID)

    document.getElementById(itemID).parentElement.setAttribute("style", "display: none")

}

function deleteItems(email){

    console.log(email)

    if(itemIDs.length > 0){

        var link = "deleteItems.php?email="+email

        for (i = 0; i<this.itemIDs.length;i++){
            link += "&item"+i+"="+this.itemIDs[i]
        }

        window.location.href=link

    }

}

function altDeleteItem(email, itemID){

    window.location.href="deleteItems.php?email="+email+"&item="+itemID

}