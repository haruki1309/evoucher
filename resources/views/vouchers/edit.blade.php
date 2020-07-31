@extends('layouts.mainlayout')

@section('css')
<link href="{{ asset('vendor/fileinput/css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('vendor/fileinput/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fileinput/themes/fas/theme.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/vouchers/edit.js') }}"></script>
<script>
    $("#image").fileinput({
        theme: 'fas',
        dropZoneEnabled: false,
        showUpload: false,
        showUploadStats: false,
        showClose: false,
        browseClass: 'btn btn-info',
        showUploadedThumbs: false,
        initialPreview: <?php echo json_encode($initialPreview, JSON_UNESCAPED_SLASHES ); ?>,
        initialPreviewConfig: <?php echo json_encode($initialPreviewConfig, JSON_UNESCAPED_SLASHES ); ?>,
        initialPreviewAsData: true,
        overwriteInitial: true,
        initialPreviewShowDelete: false,
    });

    $('.input-daterange').datepicker({
        todayBtn: true,
        todayHighlight: true,
        clearBtn: true,
        format: 'dd/mm/yyyy'
    });
</script>
@endsection

@section('page-heading', 'Voucher - ' . $evoucher->title)

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật voucher</h6>
    </div>
    <div class="card-body">
        <input type="hidden" name='status' value="{{ $evoucher->status }}">
        <form id="createEvoucher" action="{{ url('vouchers/' . $evoucher->id . '/edit') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="title">Tiêu đề mã giảm giá</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $evoucher->title }}" data-rule-required>
                </div>
            </div>

            <div class="row">
                <div class="input-daterange col-sm-6">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="issue_from">Hạn sử dụng từ ngày</label>
                            <input id="issue_from" name="issue_from" type="text" class="form-control" value="{{ date('d/m/yy', strtotime($evoucher->issue_from)) }}" data-rule-required data-rule-aftercurrentdate>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="issue_until">Hạn sử dụng đến ngày</label>
                            <input id="issue_until" name="issue_until" type="text" class="form-control" value="{{ date('d/m/yy', strtotime($evoucher->issue_until)) }}" data-rule-required data-rule-aftercurrentdate>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="value">Giá trị</label>
                            <input name="value" type="text" class="form-control" id="value" value="{{ $evoucher->value }}" data-rule-required data-rule-digits data-rule-min="0">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="unit">Đơn Vị</label>
                            <select class="form-control select2" name="unit">
                                @foreach ($unitPicklist as $unit)
                                <option value="{{ $unit['key'] }}" {{ ($unit['key'] == $evoucher->unit) ? 'selected' : '' }}>{{ $unit['value'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="5" data-rule-required>{{ $evoucher->description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="term">Các điều khoản và điều kiện</label>
                    <textarea name="term" class="form-control" id="term" rows="5" data-rule-required>{{ $evoucher->term }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="image">Hình ảnh</label>
                    <div>
                        <input name="image" id="image" name="image" type="file" class="file" data-browse-on-zone-click="true">
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection