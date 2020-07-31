$(document).ready(function() {
    VoucherHelper.load();
});

let ModalHandler = {
    show: function(id) {
        $(id).modal('show');
    }
}