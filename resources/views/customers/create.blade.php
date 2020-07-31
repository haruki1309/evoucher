@extends('layouts.mainlayout')

@section('css')
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customers/edit.js') }}"></script>
@endsection

@section('page-heading', 'Khách hàng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tạo khách hàng mới</h6>
    </div>
    <div class="card-body">
        <form action="{{ 'customers/create' }}" id="createCustomer" autocomplete="off" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="first_name">Họ</label>
                    <input name="first_name" type="text" class="form-control" id="firstname" data-rule-required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="lastname">Tên</label>
                    <input name="lastname" type="text" class="form-control" id="lastname" data-rule-required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="birthday">Ngày sinh</label>
                    <input id="birthday" name="birthday" type="text" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                    <label for="phone">Điện thoại</label>
                    <input name="phone" type="text" class="form-control" id="phone" data-rule-digits>
                </div>

                <div class="form-group col-sm-4">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" data-rule-email>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" class="form-control" id="address" rows="4"></textarea>
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