<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return View('authentication.login');
    }

    public function authenticate(Request $request) {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)) {
            return redirect()->route('vouchers.index');
        }
        else {
            return redirect()->route('login.view')->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.view');
    }
}
