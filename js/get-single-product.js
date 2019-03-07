$(document).ready(function () {

    // handle 'read one' button click
    $(document).on('click', '.single-button', function () {
        // get product id
        var id = $(this).attr('data-id');
        console.log(id);

        $.getJSON("./api/getOne.php?productId=" + id, function (data) {
            //         $.getJSON("/api/getOne.php?productId=" + id, function (data) {
            var read_one_product_html = `


            <div class ="container">

            <div class="row">
                <div class="col-md-8">
                    <img class="product-image-info " src="productImages/`+ data.image + `"/>
                </div>
                <div class="col-md-4">
                    <br>
                    <h2 class="product-info-name">  `+ data.name + ` </h2>
                    <p>Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin.
                        Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd
                        boksättare tog att antal bokstäver och blandade dem för att göra
                        ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden</p>
                    <br>
                   <h4>
                   `+ data.price + ` kr
                   </h4>
                    <button class="btn btn-Dark"> Buy</button>
                </div>
        
            </div>
        
            <div>
                Photo carousel
            </div>
        
        
        </div>

         `;

            // inject html to 'page-content' of our app
            $("#page-content").html(read_one_product_html);

            // chage page title
            changePageTitle("Create Product");
        });


    });

});

// read product record based on given ID
