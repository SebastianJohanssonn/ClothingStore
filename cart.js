
function addToShoppingcart(addProductButton) {

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