@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customers/index.js') }}"></script>
@endsection

@section('page-heading', 'Khách hàng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Khách hàng</h6>
        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">Thêm khách hàng</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="customersTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th style="min-width: 15%;">SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Điểm tích lũy</th>
                        <th>Xếp hạng</th>
                        <th style="min-width: 15%;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection