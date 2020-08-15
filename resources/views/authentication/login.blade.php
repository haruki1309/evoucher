@extends('layouts.loginlayout')

@section('title', 'Login page')

@section('form')
<div class="col-xl-6 col-lg-6 col-md-12 mt-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chain Voucher</h1>
                </div>
                <form action="{{ url('login/') }}" class="user" autocomplete="off" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control form-control-user" id="username" placeholder="Enter Username..." value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-1 py-3">
                        Sign In
                    </button>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        Chưa có tài khoản? <a class="small" href="./register">Đăng ký tài khoản mới</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection