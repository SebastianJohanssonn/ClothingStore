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
    requestData.append("collectionType", "order");
    requestData.append("action", "get");
    
    makeRequest("./admin/requestHandler.php", "POST", requestData, function(response) {
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
            var tdProductId = document.createElement("td");
            var tdUserId = document.createElement("td");
            
            tableRow.appendChild(tdOrderId);
            tableRow.appendChild(tdCourierId);
            tableRow.appendChild(tdAdressId);
            tableRow.appendChild(tdProductId);
            tableRow.appendChild(tdUserId);

            tdOrderId.innerText = order.orderID;
            tdCourierId.innerText = order.courierId;
            tdAdressId.innerText = order.adressID;
            tdProductId.innerText = order.productID;
            tdUserId.innerText = order.UserID;

            orderTable.appendChild(tableRow);
            
        }
        
    });
    
}

function viewProducts(){
    $.ajax({
        url: "./admin/products.php",
        method: "POST",
        success: function(results){
            $("#content").html(results)
        },
        error: function(err){
            alert("PROBLEM");
        }
    })
}

function viewSubscribers(){
    $.ajax({
        url: "./admin/subscribers.php",
        method: "POST",
        success: function(results){
            $("#content").html(results)
        },
        error: function(err){
            alert("PROBLEM");
        }
    })
}


function viewUsers(){
    $.ajax({
        url: "./admin/users.php",
        method: "POST",
        success: function(results){
            $("#content").html(results)
        },
        error: function(err){
            alert("PROBLEM");
            
       }
    })
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