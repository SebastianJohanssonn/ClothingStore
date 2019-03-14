
var totalPrice = 0;

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
    var productId = addProductButton.id;
    var queryString = "productId="+productId;
    fetchHelper("api/cartBackend.php", "PUT", (json) => {updateNumberNextToCartIcon()}, queryString);
}

function deleteFromShoppingcart(deleteProductButton) {

    var productId = deleteProductButton.id;
    var queryString = "productId="+productId;

    fetchHelper("api/cartBackend.php", "DELETE", (shoppingCart) => {
        updateNumberOfChosenProducts(shoppingCart);
        removeProductDivIfDoesntExist(productId, shoppingCart);
        updateTotalPrice();
    }, queryString);
}

function removeProductDivIfDoesntExist(productId, shoppingCart) {
    if (typeof shoppingCart[productId] === 'undefined') {
        var productDiv = document.getElementById("productDiv" + productId);
        productDiv.parentNode.removeChild(productDiv);
    }
}

function getAndDisplayShoppingcart() {
    fetchHelper("api/cartBackend.php", "GET", (shoppingCart) => {
        displayShoppingCart(shoppingCart);
        addAllChosenProducts(shoppingCart);
    });
}

function updateNumberNextToCartIcon() {
    fetchHelper("api/cartBackend.php", "GET", (shoppingCart) => {
        addAllChosenProducts(shoppingCart);
    });
}

function updateTotalPrice() {
    fetchHelper("api/cartBackend.php", "GET", (shoppingCart) => {
        totalPrice = 0;
        for (var productId in shoppingCart)
        {
            if(!isNaN(productId)) {
                fetchHelper("api/get.php?productId="+productId, "GET", (productInfo) => {
                    addToTotalPrice(productInfo, shoppingCart);
                });
            } 
        }
    });
}

function displayShoppingCart(shoppingCart) {
    sortedProductIdList = getSortedProductIdList(shoppingCart);
    displayProductList(sortedProductIdList, shoppingCart);  
    displayShippingOptions();
}

function displayProductList(sortedProductIdList, shoppingCart) {
    var nextProductId = sortedProductIdList.shift();
    if(!isNaN(nextProductId)) {
        fetchHelper("api/get.php?productId="+nextProductId, "GET", (productInfo) => {
            if (shoppingCart[nextProductId] != null) {
                addProductToProductContainerDiv(productInfo, shoppingCart);
            }
            displayProductList(sortedProductIdList, shoppingCart);
        });
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

function addProductToProductContainerDiv(productInfo, shoppingCart) {
    var chosenProduct = createProductDiv();

    chosenProduct.appendChild(createProductImage(productInfo));
    chosenProduct.appendChild(createProductName(productInfo));
    chosenProduct.appendChild(createProductPrice(productInfo));
    chosenProduct.appendChild(createNumberOfChosenProduct(productInfo, shoppingCart));
    chosenProduct.appendChild(createDeleteButton(productInfo));
    chosenProduct.id = "productDiv" + productInfo["productId"];

    var productContainer = document.getElementById("divOfChosenProducts");
    productContainer.appendChild(chosenProduct);

    addToTotalPrice(productInfo, shoppingCart);
}

function addToTotalPrice(productInfo, shoppingCart) {
    var productId = productInfo["productId"];
    var quantity = shoppingCart[productId];
    var unitPrice = productInfo["price"];

    var price = quantity * unitPrice;

    totalPrice += price;
    var priceTag = document.getElementById("totalprice");
    priceTag.innerText = "Total price: " + totalPrice + " kr";
}

function createProductDiv() {
    var productDiv = document.createElement("div");
    productDiv.classList.add("chosenProduct");
    return productDiv;
}

function createProductImage(productInfo) {
    var chosenProductImage = document.createElement("img");
    chosenProductImage.classList.add("shoppingcartImage");
    chosenProductImage.src = "productImages/" + productInfo["imageSrc"];
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

function createNumberOfChosenProduct(productInfo, shoppingCart) {
    var divOfNumberOfChosenProducts = document.createElement("div");
    var numberOfChosenProducts = document.createElement("p");

    var productId = productInfo["productId"];
    var quantity = shoppingCart[productId];
    numberOfChosenProducts.innerText = quantity;
    numberOfChosenProducts.id = "number" + productId;
    divOfNumberOfChosenProducts.appendChild(numberOfChosenProducts);
    return divOfNumberOfChosenProducts;
}

function updateNumberOfChosenProducts(shoppingCart) {
    addAllChosenProducts(shoppingCart);
    for (var productId in shoppingCart) {
        if (shoppingCart[productId] != null) {
            var numberOfCurrentChosenProduct = document.getElementById("number" + productId);
            numberOfCurrentChosenProduct.innerText = shoppingCart[productId];
        }
    }
}

function addAllChosenProducts(shoppingCart) {

    var numberOfAllChosenProducts = document.getElementById("numberOfAllChosenProduct");
    var number = 0;

    for (var productId in shoppingCart) {
        number += shoppingCart[productId];
    }

    numberOfAllChosenProducts.innerText = number;
}

function createDeleteButton(productInfo) {
    var deleteButton = document.createElement("button");
    deleteButton.classList.add("deleteButton");
    deleteButton.id = productInfo["productId"];
    deleteButton.innerText = "Delete";
    deleteButton.setAttribute("onclick", "deleteFromShoppingcart(this)");
    return deleteButton;
}

function displayShippingOptions() {
    $.ajax({
        type: "POST",
        url:"api/orderBackend.php",
        data:{getShippingOptions: true},
        success: function(data){
            var json = JSON.parse(data);
            for (var i = 0; i < json.length; i++) {
                var courierName = json[i]["CourierName"];
                var radioDiv = document.createElement("div");
                $("#shippingOptions").append("<div class='radio'><label for='shippingOption'>" + courierName + "</label>");
                var radioButton = document.createElement("input");
                radioButton.setAttribute("type", "radio");
                radioButton.setAttribute("name", "shippingOption");
                radioButton.setAttribute("value", courierName);
                radioButton.classList.add("shippingOption");
                $("#shippingOptions").append(radioButton);
                $("#shippingOptions").append("</div>");

            }
        }
    });
}

function placeOrder() {
    if ($("#divOfChosenProducts").children().length == 0) {
        alert("You need to choose a product to place an order");
    }
    else if (($(".shippingOption").is(':checked')) && ($("#orderAdress").val() != "")) {
        var shippingOption = $(".shippingOption:checked").val();
        var adress = $("#orderAdress").val();
        $.ajax({
            type: "POST",
            url:"api/orderBackend.php",
            data:{adress: adress, shippingOption: shippingOption},
            success: function(data){
                alert("Purchase successful!");
                location.reload();
            }
        });
    } else {
        alert("You have to select a shipping method and adress");
    }
}