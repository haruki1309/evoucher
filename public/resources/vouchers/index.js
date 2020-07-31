$(document).ready(function () {
    const SITEURL = $('meta[name="asset-path"]').attr('content');
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': X_CSRF_TOKEN
        }
    });

    $('#vouchersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "vouchers",
            type: 'GET',
        },
        columns: [
            { data: 'updated_at', name: 'updated_at', visible: false, searchable: false},
            { data: 'id', name: 'id', visible: false },
            { data: 'title', name: 'title'},
            { data: 'value', name: 'value' },
            { data: 'unit', name: 'unit' },
            { data: 'qty', name: 'qty' },
            { data: 'status', name: 'status' },
            { data: 'issue_from', name: 'issue_from' },
            { data: 'issue_until', name: 'issue_until' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [[0, 'desc']]
    });
});