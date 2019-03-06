
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

            fetch("api/get.php?productId="+productId, {
                method: 'GET',
                credentials: 'include'
            })
            .then((response) => response.json())
            .then((productInfo) => {
                console.log(productInfo);
                var productContainer = document.getElementById("divOfChosenProducts");           
            });

        }   
    });


}