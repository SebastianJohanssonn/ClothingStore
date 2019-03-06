
function addToShoppingcart(addProductButton) {
    console.log('it works!');
    var productId = addProductButton.id;
    var queryString = "productId="+productId;

    fetch("cartBackend.php", {
        method: 'PUT',
        credentials: 'include',
        body: queryString
    })
    .then((response) => response.json())
    .then((json) => {
        console.log(json);           
    });
}

function deleteFromShoppingcart(deleteProductButton) {

    var productId = deleteProductButton.id;
    var queryString = "productId="+productId;

    fetch("cartBackend.php", {
        method: 'DELETE',
        credentials: 'include',
        body: queryString
    })
    .then((response) => response.json())
    .then((json) => {
        console.log(json);           
    });
}

function displayShoppingcart() {
    fetch("cartBackend.php", {
        method: 'GET'
    })
    .then((response) => response.json())
    .then((shoppingCart) => {
        console.log(shoppingCart);
        for (var productId in shoppingCart) {
            if (shoppingCart[productId] != null) {
                fetch("api/get.php?productId="+productId, {
                    method: 'GET',
                    credentials: 'include'
                })
                .then((response) => response.json())
                .then((productInfo) => {
                    console.log(productInfo);
                    var chosenProduct = document.createElement("div");
                    chosenProduct.classList.add("chosenProduct");
                    
                    var chosenProductImage = document.createElement("img");
                    chosenProductImage.src = "data:image/jpeg;base64," + productInfo["image"];
                    chosenProduct.appendChild(chosenProductImage);

                    var nameOfChosenProduct = document.createElement("h3");
                    nameOfChosenProduct.innerText = productInfo["name"];
                    chosenProduct.appendChild(nameOfChosenProduct);

                    var priceOfChosenProduct = document.createElement("p");
                    priceOfChosenProduct.innerText = productInfo["price"] + " kr";
                    chosenProduct.appendChild(priceOfChosenProduct);

                    var deleteButton = document.createElement("button");
                    deleteButton.classList.add("deleteButton");
                    deleteButton.id = productInfo["productId"];
                    deleteButton.innerText = "Delete";
                    deleteButton.setAttribute("onclick", "deleteFromShoppingcart(this)");
                    chosenProduct.appendChild(deleteButton);

                    var productContainer = document.getElementById("divOfChosenProducts");

                    productContainer.appendChild(chosenProduct);


                });
            } 
        }   
    });


}