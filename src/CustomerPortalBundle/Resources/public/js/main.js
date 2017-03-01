function callAjaxGET(url, successCallback) {

    $.ajax({
        type: 'GET',
        url: url,
        success: successCallback,
        error: function () {
            console.log('ERROR');
        }
    });
}

function callAjaxPOST(url, data, successCallback) {

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: "application/json",
        success: successCallback,
        error: function () {
            console.log('ERROR');
        }
    });
}

function callAjaxDELETE(url, successCallback) {

    $.ajax({
        type: 'DELETE',
        url: url,
        success: successCallback,
        error: function () {
            console.log('ERROR');
        }
    });
}

window.onclick = function (event) {

    var modal = document.getElementById('CustomerModal');

    if (event.target == modal) {
        modal.style.display = 'none';
    }
};
