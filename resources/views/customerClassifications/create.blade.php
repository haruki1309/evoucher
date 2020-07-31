@extends('layouts.mainlayout')

@section('css')
<link href="{{ asset('vendor/spectrum/spectrum.min.css') }}" rel="stylesheet">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customerClassifications/edit.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/spectrum/spectrum.min.js') }}"></script>
@endsection

@section('page-heading', 'Thêm mức xếp loại khách hàng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin xếp loại</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('customer-classifications/create') }}" id="createCustomerClassification" autocomplete="off" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="value">Tên</label>
                    <input name="value" value="" type="text" class="form-control" id="value" data-rule-required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="min_score">Mức điểm tối thiểu</label>
                    <input name="min_score" value="" type="text" class="form-control" id="min_score" data-rule-required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="color">Màu sắc</label>
                    <input id="color" value="" name="color" type="text" class="form-control">
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