$(document).ready(function () {
    const SITEURL = $('meta[name="asset-path"]').attr('content');
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': X_CSRF_TOKEN
        }
    });

    $('#customersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "vouchers/re",
            type: 'GET',
            params: {
                config: $('[name="filterConfig"]').val(),
                conditionType: $('[name="conditionType"]').val(),
            }
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