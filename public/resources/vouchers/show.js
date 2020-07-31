$(document).ready(function () {
    const SITEURL = $('meta[name="asset-path"]').attr('content');
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    const RECORD = $('[name="evoucherid"]').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': X_CSRF_TOKEN
        }
    });

    $('#evoucherCodesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "vouchers/" + RECORD,
            type: 'GET',
        },
        columns: [
            { data: 'updated_at', name: 'updated_at', visible: false, searchable: false },
            { data: 'id', name: 'id', visible: false },
            { data: 'code', name: 'code' },
            { data: 'status', name: 'status' },
            { data: 'customer', name: 'customer' },
            { data: 'redeem_date', name: 'redeem_date' },
        ],
        order: [[0, 'desc']]
    });

    $('#btnOpenCreateVoucherCodeModal').click(function () {
        var evoucherId = $(this).data('evoucherid');
        var createVoucherCodeModal = $('#createCodeModal');
        createVoucherCodeModal.find('[name="evoucherid"]').val(evoucherId);
        createVoucherCodeModal.find('form').validate({ lang: 'vi' });
        createVoucherCodeModal.modal();
    });

    $('#createCodeForm').validate({
        lang: 'vi',
        submitHandler: function (form) {
            var params = $(form).serialize();
            var url = SITEURL + '/vouchers/create-code';
            helper.showProgress();
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                success: function (data) {
                    $('#createCodeModal').modal('hide');
                    $('#createCodeForm').trigger("reset");
                    helper.hideProgress();
                    helper.showPopupNotify(data.msg.type, data.msg.text);
                    location.reload();
                },
                error: function (data) {
                    helper.hideProgress();
                    helper.showPopupNotify('error', 'Unknown Error');
                }
            });

        }
    });

    $('#btnOpenReleaseVoucherCodeModal').click(function () {
        var evoucherId = $(this).data('evoucherid');
        var createVoucherCodeModal = $('#releaseCodeModal');
        createVoucherCodeModal.find('[name="evoucherid"]').val(evoucherId);
        createVoucherCodeModal.find('form').validate({ lang: 'vi' });
        createVoucherCodeModal.modal();
    });

    $('#releaseCodeModal').MultiStep({
        data: [
            {
                content: $('input[name="releaseCodeModal_Step_1"]').val(),
                label: 'Lập danh sách khách hàng'
            },
            {
                content: $('input[name="releaseCodeModal_Step_2"]').val(),
                label: 'Xác nhận giao dịch'
            }
        ],
        modalSize: 'xl',
        title: 'Phát hành Voucher Code',
        prevText: 'Quay lại',
        skipText: 'Bỏ qua',
        nextText: 'Tiếp tục',
        finishText: 'Hoàn thành',
        final: 'Xác nhận hoàn thành',
        finalLabel: 'Hoàn thành',
    });

    var releaseCodeCustomerTable = $('#releaseCodeCustomerTable').DataTable({
        deferRender: true,
        columnDefs: [{
            targets: 0,
            data: null,
            defaultContent: '',
            orderable: false,
            className: 'select-checkbox'
        }],
        select: {
            style: 'os',
            selector: 'td:first-child',
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "vouchers/customers",
            type: 'GET',
        },
        columns: [
            { data: '', name: ''},
            { data: 'updated_at', name: 'updated_at', visible: false, searchable: false },
            { data: 'id', name: 'id', visible: false },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
        ],
        order: [[1, 'desc']]
    });
    
    $('#releaseCodeModal').find('.btn-next').click(function() {
        
    });

});