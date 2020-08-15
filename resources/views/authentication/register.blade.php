@extends('layouts.loginlayout')

@section('title', 'Register page')

@section('form')
<div class="col-xl-6 col-lg-6 col-md-12 mt-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chain Voucher</h1>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ action('Auth\RegisterController@validateBeforeInsert') }}" class="user" autocomplete="off" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                    <div class="form-group">
                        <input name="first_name" type="text" class="form-control form-control-user" id="first_name" placeholder="Tên" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-group">
                        <input name="last_name" type="text" class="form-control form-control-user" id="last_name" placeholder="Họ" value="{{ old('last_name') }}" required>
                    </div>                    
                    <div class="form-group">
                        <input name="email" type="text" class="form-control form-control-user" id="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">                        
                        <input name="username" type="text" class="form-control form-control-user" id="username" placeholder="Tên đăng nhập" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control form-control-user" id="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="form-group">                        
                        <input name="password_confirmation" type="password" class="form-control form-control-user" id="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-1 py-3">
                        Đăng ký
                    </button>
                    <div class="text-center">
                        Đã có tài khoản? <a class="small" href="./login">Đăng nhập ngay</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection