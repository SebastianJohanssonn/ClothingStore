function makeRequest(url, method, formdata, callback){
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json();
    })
    .then((result) => {
        callback(result);
    })
    .catch((err) => {
        console.log(err);
    })
}

function viewOrders(){
    var requestData = new FormData();
    requestData.append("collectionType", "orders");
    requestData.append("action", "get");
    
    makeRequest("./api/read.php", "POST", requestData, function(response) {
        console.log(response);
        var divContent = document.getElementById("content");
        var orderTemp = document.getElementById("orderTemp");
        var clone = document.importNode(orderTemp.content, true);
        divContent.appendChild(clone);

        var orderTable = document.getElementById("orders");
        
        for (var order of response) {

            var tableRow = document.createElement("tr");
            var tdOrderId = document.createElement("td");
            var tdCourierId = document.createElement("td");
            var tdAdressId = document.createElement("td");
            var tdUserId = document.createElement("td");
            
            tableRow.appendChild(tdOrderId);
            tableRow.appendChild(tdCourierId);
            tableRow.appendChild(tdAdressId);
            tableRow.appendChild(tdUserId);

            tdOrderId.innerText = order.orderID;
            tdCourierId.innerText = order.courierName;
            tdAdressId.innerText = order.adress;
            tdUserId.innerText = order.UserID;

            orderTable.appendChild(tableRow);
            
        }
        
    });
    
}

function viewProducts(){
    var requestData = new FormData();
    requestData.append("collectionType", "products");
    requestData.append("action", "get");
    
    makeRequest("./api/read.php", "POST", requestData, function(response) {
        console.log(response);
        var divContent = document.getElementById("content");
        var productTemp = document.getElementById("productTemp");
        var clone = document.importNode(productTemp.content, true);
        divContent.appendChild(clone);

        var productTable = document.getElementById("products");
        
        for (var product of response) {

            var tableRow = document.createElement("tr");
            var tdProductId = document.createElement("td");
            var tdName = document.createElement("td");
            var tdPrice = document.createElement("td");
            var tdImageId = document.createElement("td");
            var tdCategoryId = document.createElement("td");
            var tdUnitsInStock = document.createElement("td");
            
            tableRow.appendChild(tdProductId);
            tableRow.appendChild(tdName);
            tableRow.appendChild(tdPrice);
            tableRow.appendChild(tdImageId);
            tableRow.appendChild(tdCategoryId);
            tableRow.appendChild(tdUnitsInStock);

            tdProductId.innerText = product.productId;
            tdName.innerText = product.name;
            tdPrice.innerText = product.price;
            tdImageId.innerText = product.imageId;
            tdCategoryId.innerText = product.categoryId;
            tdUnitsInStock.innerText = product.unitsInStock;

            productTable.appendChild(tableRow);
            
        }
        
    });
}

function updateStock(){
    var requestData = new FormData();
    var productId = document.getElementById("productId").value;
    var amount = document.getElementById("units").value;

    requestData.append("collectionType", "products");
    requestData.append("action", "update");
    requestData.append("prodId", productId);
    requestData.append("amount", amount);
    
    makeRequest("./api/update.php", "POST", requestData, function(response) {
        console.log(response);
    });
    location.reload();
}
function viewSubscribers(){
    var requestData = new FormData();
    requestData.append("collectionType", "subscribers");
    requestData.append("action", "get");
    
    makeRequest("./api/read.php", "POST", requestData, function(response) {
        console.log(response);
        var divContent = document.getElementById("content");
        var newsTemp = document.getElementById("newsTemp");
        var clone = document.importNode(newsTemp.content, true);
        divContent.appendChild(clone);

        var newsTable = document.getElementById("newsletter");

        for(var news of response){
            var tableRow = document.createElement("tr");
            var tdSignUpId = document.createElement("td");
            var tdEmail = document.createElement("td");
            var tdUserId = document.createElement("td");
            var tdName = document.createElement("td");

            tableRow.appendChild(tdSignUpId);
            tableRow.appendChild(tdEmail);
            tableRow.appendChild(tdUserId);
            tableRow.appendChild(tdName);

            tdSignUpId.innerText = news.signupID;
            tdEmail.innerText = news.email;
            tdUserId.innerText = news.userID;
            tdName.innerText = news.name;

            newsTable.appendChild(tableRow);
        }
    });
}

function logout(){
    $.ajax({
        url: "./admin/logout.php",
        method: "POST",
        success: function(results){
            $("#content").html(results)
            location.reload();
        },
        error: function(err){
            alert("PROBLEM");
        }
    })
}