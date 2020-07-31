@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/vouchers/show.js') }}"></script>
@endsection

@section('page-heading', 'Voucher - ' . $evoucher->title)

@section('content')
<div class="pb-3">
    @if($evoucher->status != 'sent')
    <a href="{{ url('vouchers/' . $evoucher->id . '/edit') }}" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
        </span>
        <span class="text">Cập nhật</span>
    </a>
    @endif
    <button id="btnOpenReleaseVoucherCodeModal" class="btn btn-info btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-envelope"></i>
        </span>
        <span class="text">Phát hành voucher</span>
    </button>
    <button id="btnOpenCreateVoucherCodeModal" class="btn btn-warning btn-icon-split btn-sm" type="button" data-evoucherid="{{ $evoucher->id }}">
        <span class="icon text-white-50">
            <i class="fas fa-qrcode"></i>
        </span>
        <span class="text">Tạo Voucher Code</span>
    </button>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin chung</h6>
    </div>
    <div class="card-body">
        <input name="evoucherid" type="hidden" value="{{ $evoucher->id }}">
        <table class="table table-borderless">
            <tr>
                <td class="font-weight-bold" style="width: 25%">Tiêu đề mã giảm giá</td>
                <td colspan="3">{{ $evoucher->title }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Hạn sử dụng từ ngày</td>
                <td style="width: 25%">{{ date('d/m/yy', strtotime($evoucher->issue_from)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Hạn sử dụng đến ngày</td>
                <td style="width: 25%">{{ date('d/m/yy', strtotime($evoucher->issue_until)) }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Số lượng</td>
                <td style="width: 25%">{{ $evoucher->qty }}</td>
                <td class="font-weight-bold" style="width: 25%">Giá trị</td>
                <td style="width: 25%">{{ $evoucher->value . ' ' . displayUnitPicklist($evoucher->unit) }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Ngày tạo</td>
                <td style="width: 25%">{{ date('d/m/yy h:m:s', strtotime($evoucher->created_at)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Tạo bởi</td>
                <td style="width: 25%">{{ getUserFullnameById($evoucher->created_by) }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Cập nhật lần cuối</td>
                <td style="width: 25%">{{ date('d/m/yy h:m:s', strtotime($evoucher->updated_at)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Cập nhật bởi</td>
                <td style="width: 25%">{{ getUserFullnameById($evoucher->updated_by) }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Trạng thái</td>
                <td style="width: 25%">
                    @if ($evoucher->status == 'new')
                        <span class=" btn-sm btn-success">{{ $evoucher->status }}</span>
                    @elseif ($evoucher->status == 'code-generated')
                        <span class=" btn-sm btn-info">{{ $evoucher->status }}</span>
                    @elseif ($evoucher->status == 'sent')
                        <span class=" btn-sm btn-warning">{{ $evoucher->status }}</span>
                    @endif
                </td>
                <td class="font-weight-bold" style="width: 25%"></td>
                <td style="width: 25%"></td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Mô tả</td>
                <td colspan="3">{{ $evoucher->description }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Các điều khoản và điều kiện</td>
                <td colspan="3">{{ $evoucher->term }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Hình ảnh</td>
                <td colspan="3">
                    @foreach(explode(' [##] ', $evoucher->image) as $image)
                    <img src="{{ url($image) }}" class="img-fluid" alt="{{ $evoucher->title }}">
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>

@if(count($evoucher->evoucherCodes) > 0)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách code</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="evoucherCodesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th name="updated_at">#</th>
                        <th name="id">#</th>
                        <th name="code">Code</th>
                        <th name="status">Trạng thái</th>
                        <th name="customer">Khách hàng</th>
                        <th name="redeem_date">Ngày sử dụng</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection

@section('modals')
    @include('vouchers.modals.create_code_modal')
    @include('vouchers.modals.release_code_modal.parent')
@endsection