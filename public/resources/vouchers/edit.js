$(document).ready(function() {
    $("#image").fileinput({
        theme: 'fas',
        dropZoneEnabled: false,
        showUpload: false,
        showUploadStats: false,
        showClose: false,
        browseClass: 'btn btn-info',
        showUploadedThumbs: false,
    });

    $('.input-daterange').datepicker({
        todayBtn: true,
        todayHighlight: true,
        clearBtn: true,
        format: 'dd/mm/yyyy'
    });

    $('select[name="unit"]').select2({theme: 'bootstrap4'});
    
    $('#createEvoucher').validate({lang: 'vi'});

    $('select[name="unit"]').change(function() {
        var unit = $(this).val();
        if(unit == 'percent') {
            $('[name="value"]').rules('add', {max: 100});
        }
        else if(unit == 'vnd') {
            $('[name="value"]').rules('remove', 'max');
        }
    }).trigger('change');
});

async function createVoucher() {
    var params = {
        token: "VC001",
        price: "15000",
        issue_from: "2020-07-01",
        issue_until: "2020-09-01",
        redeem_date: "2020-08-01"
    };
    var result = await VoucherHelper.createVoucher(params);
    if(result) {
        console.log("CREATE SUCCESS");
    }
    else {
        console.log("CREATE FAIL");
    }
}

async function getVoucher() {
    var token = "VC001";
    var voucher = await VoucherHelper.getVoucher(token);
    console.log(voucher);
}