@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customerClassifications/index.js') }}"></script>
@endsection

@section('page-heading', 'Xếp loại khách hàng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Xếp loại khách hàng</h6>
        <a href="{{ route('customerClassifications.create') }}" class="btn btn-primary btn-sm">Thêm mức xếp loại</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="customerClassificationsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Mức điểm tối thiểu</th>
                        <th>Màu sắc</th>
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