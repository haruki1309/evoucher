<div class="modal fade animated--grow-in" id="createCodeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title font-weight-bold text-primary">Tạo Voucher Code</div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createCodeForm" method="POST">
                    <input name="evoucherid" value="" type="hidden">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="codeLength">Độ dài</label>
                            <input name="codeLength" type="text" class="form-control" id="codeLength" data-rule-required data-rule-range="[4, 20]" data-rule-digits>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="qty">Số lượng</label>
                            <input name="qty" type="text" class="form-control" id="qty" data-rule-required data-rule-digits data-rule-mim="1">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Hủy</button>
                <button class="btn btn-primary btn-sm" type="submit" form="createCodeForm">Tạo</button>
            </div>
        </div>
    </div>
</div>