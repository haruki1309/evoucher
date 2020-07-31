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
        <form id="selectFilteredList" action="{{ url('vouchers/release/step-1a') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="font-weight-bold" for="filterdList">Chọn từ danh sách có sẵn</label>
                    <div class="row">
                        <div class="col-sm-10">
                            <input name="filterdList" type="text" class="form-control" id="filterdList" data-rule-required>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-info" href="javascript:ModalHandler.show('#customersFilterModal')">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <span class="font-weight-bold">Hoặc:&nbsp;</span><a href="{{ url('vouchers/release/step-1b') }}">Tạo danh sách với bộ lọc</a>
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

@section('js')
<script>
    $('#selectFilteredList').validate({lang: 'vi'});
</script>
@endsection