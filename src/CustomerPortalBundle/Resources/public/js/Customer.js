var Customer = {};

Customer.getCustomerInfo = function () {
    callAjaxGET('/portal/get-customer.ajax', Customer.fillCustomerInfo);
};

Customer.fillCustomerInfo = function (data) {
    $("#customerName").html(data.name);
    $("#customerAddress").html(data.address);
    $("#customerCity").html(data.city);
    $("#customerCountry").html(data.country);
};