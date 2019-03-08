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

function makeSubscriber(){
    var requestData = new FormData();
    var signUpName = document.getElementById("signup-name").value;
    var signUpEmail = document.getElementById("signup-email").value;
    var result = document.getElementById("response");

    requestData.append("collectionType", "subscribers");
    requestData.append("action", "create");
    requestData.append("signUpEmail", signUpEmail);
    requestData.append("signUpName", signUpName);

    makeRequest("./api/create.php", "POST", requestData, function(response) {
        result.append(response);
    });
}