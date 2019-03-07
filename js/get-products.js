$(document).ready(function () {
    // show list of product on first load
    showProducts();
});

// function to show list of products
function showProducts() {
    $.getJSON("./api/getCategory.php?category=4", function (data) {
        var read_products_html = ``;
        // loop through returned list of data
        $.each(data.records, function (key, val) {
            // creating new table row per record
            read_products_html += `
            <div class="col-md-3 product">
                    <a href="#" class="single-button" data-id="` + val.productId + `">
                        <img src="productImages/`+ val.imageSrc + `">    
                    </a>
                    <div class="product-text">
                    `+ val.name + `
                        <div class="product-price">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    `+ val.price + `
                                            </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-light"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
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
