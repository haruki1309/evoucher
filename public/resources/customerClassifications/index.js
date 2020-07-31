$(document).ready(function () {
    const SITEURL = $('meta[name="asset-path"]').attr('content');
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': X_CSRF_TOKEN
        }
    });

    $('#customerClassificationsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "customer-classifications",
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id', visible: false },
            { data: 'key', name: 'key' },
            { data: 'value', name: 'value' },
            { data: 'min_score', name: 'min_score' },
            { data: 'color', name: 'color' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [[0, 'asc']]
    });
});