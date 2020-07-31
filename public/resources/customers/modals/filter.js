$(document).ready(function () {
    $('.select2').select2({ theme: 'bootstrap4' });
    $('.datetime-picker').datepicker({
        todayBtn: true,
        todayHighlight: true,
        clearBtn: true,
        format: 'dd/mm/yyyy'
    });
    $('#addCustomerFilterForm').validate({
        lang: 'vi',
        submitHandler: function (form) {
            var params = $(form).serialize(); 
            params.type = 'customer';
            var url = SITEURL + '/filters/store';
            helper.showProgress();
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                success: function (data) {
                    $('#addCustomerFilterForm').modal('hide');
                    $('#addCustomerFilterForm').trigger("reset");
                    helper.hideProgress();
                    helper.showPopupNotify(data.msg.type, data.msg.text);
                    console.log(data.compares);
                    console.log(data.values);
                },
                error: function (data) {
                    helper.hideProgress();
                    helper.showPopupNotify('error', 'Unknown Error');
                }
            });
        }
    });
    
    $('#customersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "customers",
            type: 'GET',
        },
        columns: [
            { data: 'updated_at', name: 'updated_at', visible: false, searchable: false },
            { data: 'id', name: 'id', visible: false },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
            { data: 'accumulated_points', name: 'accumulated_points' },
            { data: 'classification', name: 'classification' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [[0, 'desc']]
    });
});