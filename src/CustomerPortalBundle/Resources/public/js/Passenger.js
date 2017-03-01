var Passenger = {
    passengerInfoTableID: '#passengerInfoTable tbody',
    customerModalID: '#CustomerModal',
    CustomerModalFormID: '#CustomerModalForm'
};

Passenger.getPassengersList = function (clear) {

    clear = typeof clear !== 'undefined' ? clear : true;

    if (clear) {
        $(Passenger.passengerInfoTableID).empty();
    }

    callAjaxGET('/portal/get-passengers.ajax', Passenger.fetchPassengersData);
};

Passenger.fetchPassengersData = function (data) {

    for (var i = 0; i < data.length; i++) {

        var btn = '<input onclick="Passenger.delPassenger(' + data[i].id + ')" id="deleteCustomer" type="submit" value="X">';

        var element = document.createElement("tr");
        element.setAttribute('passengerID', data[i].id);
        $(element).append('<td>' + data[i].title + '</td>');
        $(element).append('<td>' + data[i].name + '</td>');
        $(element).append('<td>' + data[i].surname + '</td>');
        $(element).append('<td>' + data[i].passportID + '</td>');
        $(element).append('<td>' + btn + '</td>');

        $(Passenger.passengerInfoTableID).append(element);
    }
};

Passenger.getPassengerFormData = function () {
    var passengerData = {};

    passengerData.title = $('#title').val();
    passengerData.name = $('#name').val();
    passengerData.surname = $('#surname').val();
    passengerData.passportID = $('#passportID').val();

    return passengerData;
};

Passenger.addPassenger = function (passengerData) {

    $(Passenger.customerModalID).hide();

    callAjaxPOST('/portal/add-passenger.ajax', JSON.stringify(passengerData), Passenger.getPassengersList);

    $(Passenger.CustomerModalFormID).trigger("reset");
};

Passenger.delPassenger = function (passengerID) {

    var url = '/portal/del-passenger.ajax/' + passengerID;

    callAjaxDELETE(url, Passenger.removePassengerRow(passengerID));
};

Passenger.removePassengerRow = function (passengerID) {
    $("tr[passengerID='" + passengerID + "']").remove();
};

Passenger.showPassengerModal = function () {
    $(Passenger.customerModalID).show();
};

Passenger.hidePassengerModal = function () {
    $(Passenger.customerModalID).hide();
};