var Customer ={

    getCustomerInfo: function () {
        callAjaxGET('/portal/get-customer.ajax', this.fillCustomerInfo);
    },

    fillCustomerInfo: function (data) {
        $("#customerName").html(data.name);
        $("#customerAddress").html(data.address);
        $("#customerCity").html(data.city);
        $("#customerCountry").html(data.country);
    }
};