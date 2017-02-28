function getPassengersList(clear) {

    clear = typeof clear !== 'undefined' ? clear : true;

    if (clear) {
        $("#passengerInfoTable tbody").empty();
    }

    callAjaxGET('/portal/get-passengers.ajax', fetchPassengersData);
}

function fetchPassengersData(data) {

    for (var i = 0; i < data.length; i++) {

        var btn = '<input onclick="delPassenger(' + data[i].id + ')" id="deleteCustomer" type="submit" value="X">';

        var element = document.createElement("tr");
        element.setAttribute('passengerID', data[i].id);
        $(element).append('<td>' + data[i].title + '</td>');
        $(element).append('<td>' + data[i].name + '</td>');
        $(element).append('<td>' + data[i].surname + '</td>');
        $(element).append('<td>' + data[i].passportID + '</td>');
        $(element).append('<td>' + btn + '</td>');

        $("#passengerInfoTable tbody").append(element);
    }
}

function getPassengerFormData() {
    var passengerData = {};

    passengerData.title = $('#title').val();
    passengerData.name = $('#name').val();
    passengerData.surname = $('#surname').val();
    passengerData.passportID = $('#passportID').val();

    return passengerData;
}

function addPassenger(passengerData) {

    $('#CustomerModal').hide();

    callAjaxPOST('/portal/add-passenger.ajax', JSON.stringify(passengerData), getPassengersList);
}

function delPassenger(passengerID) {

    var url = '/portal/del-passenger.ajax/' + passengerID;

    callAjaxDELETE(url, removePassengerRow(passengerID));
}

function removePassengerRow(passengerID) {
    $("tr[passengerID='" + passengerID + "']").remove();
}

function showPassengerModal() {
    $('#CustomerModal').show();
}

function hidePassengerModal(){
    $('#CustomerModal').hide();
}
