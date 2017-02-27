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

