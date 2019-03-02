
function addToShoppingcart(addProductButton) {

    var productId = addProductButton.id;
    var queryString = "productId="+productId;

    fetch("cart.php", {
        method: 'PUT',
        credentials: 'include',
        body: queryString
    })
    .then((response) => response.json())
    .then((json) => {
        console.log(json);           
    });
}