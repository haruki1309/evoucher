$(document).ready(function () {
    $('input[name="birthday"]').datepicker({
        todayBtn: true,
        todayHighlight: true,
        clearBtn: true,
        format: 'dd/mm/yyyy'
    });

    $('#createCustomer').validate({lang: 'vn'});
});