$(document).ready(function () {
    // show list of product on first load
    let id = $('#category').val();

    console.log(id);
    let name;

    name = "hejj";
    if (id == 2) {
        name = "Shoes";
    } else if (id == 3) {
        name = "Accessorices";
    } else if (id == 4) {
        name = "Clothes"
    }
    showCategory(id, name);


});

// function to show list of products
function showCategory(id, name) {
    $.getJSON("./api/getCategory.php?category=" + id + " ", function (data) {
        var read_products_html = `
        <div class="container">
            <div class="row landing">
                <div class="col-md-4 landing-picture" style=" background-image: url(https://www.junkyard.se/media/catalog/category/sweaters.jpg);">
                </div>
                <div class="col-md-8 landing-text">
                    <h2>`+ name + `</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id massa convallis lectus euismod blandit. Suspendisse potenti. Proin consectetur ac felis a posuere. Aenean viverra laoreet diam sit amet dictum. Sed tempor quam ante. Etiam dapibus, mauris eu ornare accumsan, ipsum purus fringilla ex, ut ullamcorper metus lacus id purus. Pellentesque blandit ornare ante, vitae aliquam metus blandit eget.</p>
                </div>
            </div>
            `;
            // loop through returned list of data
            $.each(data.records, function (key, val) {
                // creating new table row per record
                read_products_html += `
                <div class="container products">
                    <div class="col-md-3 product">
                        <a href="#" class="single-button" data-id="`+ val.productId + `">
                            <img class="product-image" src="productImages/`+ val.imageSrc + `">    
                        </a>
                        <div class="product-text">
                            `+ val.name + `
                        </div>
                        <div class="product-price">
                            `+ val.price + ` kr
                        </div>
                        <div>
                            <button class="btn btn-Dark" id="`+ val.productId + `" onclick="addToShoppingcart(this)"> Buy</button>
                        </div>
                </div>
                <tr>
                </tr>`;
        });
        // end table
        read_products_html += `</table>`;
        $("#page-content").html(read_products_html);
    });
}
