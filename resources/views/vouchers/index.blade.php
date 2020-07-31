@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/vouchers/index.js') }}"></script>
@endsection

@section('page-heading', 'Vouchers')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Đợt phát hành voucher</h6>
        <a href="{{ route('vouchers.create') }}" class="btn btn-primary btn-sm">Thêm đợt phát hành</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="vouchersTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="card-header">
                        <th>#</th>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Giá trị</th>
                        <th>Đơn vị</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection