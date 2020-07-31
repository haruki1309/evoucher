@extends('layouts.mainlayout')

@section('css')
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customers/edit.js') }}"></script>
@endsection

@section('page-heading', 'Khách hàng - ' . $customer->first_name . ' ' . $customer->last_name)

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật thông tin khách hàng</h6>
    </div>
    <div class="card-body">
        <form action="{{ 'customers/create' }}" id="createCustomer" autocomplete="off" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstname">Họ</label>
                    <input name="first_name" value="{{ $customer->first_name }}" type="text" class="form-control" id="firstname" data-rule-required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="lastname">Tên</label>
                    <input name="last_name" value="{{ $customer->last_name }}" type="text" class="form-control" id="lastname" data-rule-required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="birthday">Ngày sinh</label>
                    <input id="birthday" value="{{ date('d/m/yy', strtotime($customer->birthday)) }}" name="birthday" type="text" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                    <label for="phone">Điện thoại</label>
                    <input name="phone" value="{{ $customer->phone }}" type="text" class="form-control" id="phone" data-rule-digits>
                </div>

                <div class="form-group col-sm-4">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $customer->email }}" type="email" class="form-control" id="email" data-rule-email>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" class="form-control" id="address" rows="4">{{ $customer->address }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection