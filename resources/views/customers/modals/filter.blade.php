<div id="customersFilterModal" class="modal animated--fade-in" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold">Thêm bộ lọc - Khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCustomerFilterForm" action="" autocomplete="off" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group col-sm-12">
                        <label class="font-weight-bold">Tên bộ lọc</label>
                        <input name="name" type="text" class="form-control" id="name" data-rule-required>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Điều kiện lọc</label>
                            <select name="conditionType" class="select2 form-control" data-rule-required>
                                <option value="or">Điều kiện HOẶC - Thỏa mãn ít nhất 1 điều kiện</option>
                                <option value="and">Điều kiện VÀ - Thỏa mãn tất cả điều kiện</option>
                            </select>
                        </div>
                        <div class="border rounded-sm p-3">
                            <div class="conditionsList">
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Họ</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[first_name]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[first_name]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Tên</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[last_name]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[last_name]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Ngày sinh</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[birthday]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[birthday]" type="text" class="form-control datetime-picker">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Điện thoại</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[phone]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[phone]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Địa chỉ</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[address]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[address]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Email</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[email]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="value[email]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <label class="font-weight-bold">Xếp hạng</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="compare[classification]" class="form-control select2">
                                            <option value="equal">Bằng</option>
                                            <option value="contain">Chứa</option>
                                            <option value="notEqual">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="value[classification][]" class="form-control select2" multiple="multiple">
                                            @php($classifications = App\Models\CustomerClassification::all())
                                            @foreach($classifications as $classification)
                                            <option value="{{ $classification->key }}">{{ $classification->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" form="addCustomerFilterForm">Thêm</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('resources/customers/modals/filter.js') }}"></script>