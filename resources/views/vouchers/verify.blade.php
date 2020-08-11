@extends('layouts.mainlayout')

@section('css')
    
@endsection

@section('js')
    
@endsection

@section('page-heading', 'Vouchers')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xác thực voucher</h6>
        </div>
        <div class="card-body">
            <form action="{{ action('Vouchers\VoucherController@verify') }}" autocomplete="off" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="voucherCode">Nhập mã voucher</label>
                <input type="text" name="voucherCode" required>
                <input type="submit" name="verifyButton" value="Xác thực">
            </form>
        </div>
    </div>

    @if($evoucherCode != null)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin voucher</h6>
        </div>
        <div class="card-body">
            <p>Code: {{ $evoucherCode->code }}</p>
            <p>Evoucher ID: {{ $evoucherCode->id }}</p>
            <p>Evoucher title: {{ $evoucher->title }}</p>
            <p>Brand ID: {{ $evoucherCode->brand_id }}</p>
            <p>Brand name: {{ $brand->name }}</p>
            <p>Customer ID: {{ $evoucherCode->customer_id }}</p>
            <p>Customer name: {{ $customer->first_name }} {{ $customer->last_name }}</p>
            <p>Status: {{ $evoucherCode->status }}</p>
            <p>Redeem date: {{ $evoucherCode->redeem_date }}</p>
        </div>
    </div>
    @endif
@endsection