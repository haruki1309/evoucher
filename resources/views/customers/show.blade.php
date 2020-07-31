@extends('layouts.mainlayout')

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('resources/customers/show.js') }}"></script>
@endsection

@section('page-heading', 'Khách hàng - ' . $customer->first_name . ' ' . $customer->last_name)

@section('content')
<div class="pb-3">
    <a href="{{ url('customers/' . $customer->id . '/edit') }}" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
        </span>
        <span class="text">Cập nhật</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin chung</h6>
    </div>
    <div class="card-body">
        <input name="evoucherid" type="hidden" value="{{ $customer->id }}">
        <table class="table table-borderless">
            <tr>
                <td class="font-weight-bold" style="width: 25%">Họ</td>
                <td style="width: 25%">{{ $customer->first_name }}</td>
                <td class="font-weight-bold" style="width: 25%">Tên</td>
                <td style="width: 25%">{{ $customer->last_name }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Điểm tích lũy</td>
                <td style="width: 25%">{{ $customer->accumulated_points }}</td>
                <td class="font-weight-bold" style="width: 25%">Xếp hạng</td>
                <td style="width: 25%">
                    @if(!empty($customer->customerClassification->color))
                    <span class="btn-sm" style="{{ 'background:' . $customer->customerClassification->color . '; color: #fff;' }}">{{ $customer->customerClassification->value }}</span>
                    @else
                    {{ $customer->customerClassification->value }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Điện thoại</td>
                <td style="width: 25%">{{ $customer->phone }}</td>
                <td class="font-weight-bold" style="width: 25%">Email</td>
                <td style="width: 25%">{{ $customer->email }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Ngày sinh</td>
                <td style="width: 25%">{{ date('d/m/yy', strtotime($customer->birthday)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Địa chỉ</td>
                <td style="width: 25%">{{ $customer->address }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Ngày tạo</td>
                <td style="width: 25%">{{ date('d/m/yy h:m:s', strtotime($customer->created_at)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Tạo bởi</td>
                <td style="width: 25%">{{ getUserFullnameById($customer->created_by) }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 25%">Cập nhật lần cuối</td>
                <td style="width: 25%">{{ date('d/m/yy h:m:s', strtotime($customer->updated_at)) }}</td>
                <td class="font-weight-bold" style="width: 25%">Cập nhật bởi</td>
                <td style="width: 25%">{{ getUserFullnameById($customer->updated_by) }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection

@section('modals')
@endsection