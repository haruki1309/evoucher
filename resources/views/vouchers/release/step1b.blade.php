@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')

@endsection

@section('page-heading', 'Phát hành Voucher')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bước 1: Lập danh sách khách hàng</h6>
    </div>
    <div class="card-body">
        <form id="createEvoucher" action="{{ url('vouchers/release/step-1a') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-4">
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
                                    <select name="operator[first_name]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[last_name]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[birthday]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[phone]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[address]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[email]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
                                    <select name="operator[classification]" class="form-control select2">
                                        <option value="=">Bằng</option>
                                        <option value="like">Chứa</option>
                                        <option value="<>">Khác</option>
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
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <span class="font-weight-bold">Hoặc:&nbsp;</span><a href="{{ url('vouchers/release/step-1a') }}">Chọn từ danh sách có sẵn</a>
                    <button class="float-right btn btn-sm btn-primary" type="submit">Tiếp tục</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('modals')
@include('customers.modals.filter')
@endsection