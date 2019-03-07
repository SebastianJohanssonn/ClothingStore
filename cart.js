
function fetchHelper(url, method, callback, queryString = "") {

    if (queryString != "") {
        var htmlInit = {
            method: method,
            credentials: 'include',
            body: queryString
        }
    } else {
        var htmlInit = {
            method: method
        }
    }

    fetch(url, htmlInit)
    .then((response) => response.json())
    .then((json) => {
        callback(json);
    });

}

function addToShoppingcart(addProductButton) {
    console.log('it works!');
    var productId = addProductButton.id;
    var queryString = "productId="+productId;

    fetchHelper("cartBackend.php", "PUT", (json) => {console.log(json)}, queryString);
}

function deleteFromShoppingcart(deleteProductButton) {

    var productId = deleteProductButton.id;
    var queryString = "productId="+productId;

    fetchHelper("cartBackend.php", "DELETE", (json) => {console.log(json)}, queryString);
}

function getAndDisplayShoppingcart() {
    fetchHelper("cartBackend.php", "GET", displayShoppingCart);
}

function displayShoppingCart(shoppingCart) {
    productIdList = getSortedProductIdList(shoppingCart);
    displayProductList(productIdList);  
}

function displayProductList(productList) {
    var nextProductId = productList.shift();
    console.log(nextProductId);
    if(!isNaN(nextProductId)) {
        fetchHelper("api/get.php?productId="+nextProductId, "GET", (productInfo) => {
            addProductToProductContainerDiv(productInfo);
            displayProductList(productList);
        })
    }
}

function getSortedProductIdList(shoppingCart) {
    productIdList = [];
    for (var productId in shoppingCart) {
        productIdList.push(productId);
    }
    productIdList.sort();
    return productIdList;
}

function addProductToProductContainerDiv(productInfo) {
    var chosenProduct = createProductDiv();

    chosenProduct.appendChild(createProductIgame(productInfo));
    chosenProduct.appendChild(createProductName(productInfo));
    chosenProduct.appendChild(createProductPrice(productInfo));
    chosenProduct.appendChild(createDeleteButton(productInfo));

    var productContainer = document.getElementById("divOfChosenProducts");
    productContainer.appendChild(chosenProduct);
}

function createProductDiv() {
    var productDiv = document.createElement("div");
    productDiv.classList.add("chosenProduct");
    return productDiv;
}

function createProductIgame(productInfo) {
    var chosenProductImage = document.createElement("img");
    chosenProductImage.classList.add("shoppingcartImage");
    chosenProductImage.src = "data:image/jpeg;base64," + productInfo["image"];
    return chosenProductImage;
}

function createProductName(productInfo) {
    var divOfProductsName = document.createElement("div");
    divOfProductsName.id = "productsNameDiv";
    var nameOfChosenProduct = document.createElement("h3");
    nameOfChosenProduct.innerText = productInfo["name"];
    divOfProductsName.appendChild(nameOfChosenProduct);
    return divOfProductsName;
}

function createProductPrice(productInfo) {
    var priceOfChosenProduct = document.createElement("p");
    priceOfChosenProduct.innerText = productInfo["price"] + " kr";
    return priceOfChosenProduct;
}

function createDeleteButton(productInfo) {
    var deleteButton = document.createElement("button");
    deleteButton.classList.add("deleteButton");
    deleteButton.id = productInfo["productId"];
    deleteButton.innerText = "Delete";
    deleteButton.setAttribute("onclick", "deleteFromShoppingcart(this)");
    return deleteButton;
}