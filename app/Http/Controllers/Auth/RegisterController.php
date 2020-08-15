<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Redirect, Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    protected $redirectTo = '/vouchers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:user'],            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ];

        $messages = [
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.required'  => 'Mật khẩu không được để trống',
            'password_confirmation.required'  => 'Nhập lại mật khẩu không được để trống',
            'first_name.required'  => 'Tên không được để trống',
            'last_name.required'  => 'Họ không được để trống',
            'email.required'  => 'Email không được để trống',
            'email.unique'  => 'Email đã tồn tại',
            'username.unique'  => 'Tên đăng nhập đã tồn tại',
            'password_confirmation.confirmed' => 'Mật khẩu nhập lại chưa khớp'
        ];

        $validator = Validator::make($data, $rules, $messages)->validate();

        // if($validator->fails()) {
        //     return redirect()->route('register.view')->withErrors($validator)->withInput();
        // }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }

    public function registerView($matchPassword = 1, $existingUsername = 0, $existingEmail = 0) {
        return view('authentication.register', compact('matchPassword', 'existingUsername', 'existingEmail'));
    }

    public function validateBeforeInsert(Request $request) {
        $data = $request->input();
        $validator = $this->validator($data);

        // $rules = [
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'max:255', 'unique:user'],            
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'password_confirmation' => ['required', 'string', 'min:8'],
        // ];

        // $messages = [
        //     'username.required' => 'Tên đăng nhập không được để trống',
        //     'password.required'  => 'Mật khẩu không được để trống',
        //     'password_confirmation.required'  => 'Nhập lại mật khẩu không được để trống',
        //     'first_name.required'  => 'Tên không được để trống',
        //     'last_name.required'  => 'Họ không được để trống',
        //     'email.required'  => 'Email không được để trống',
        //     'email.unique'  => 'Email đã tồn tại',
        //     'username.unique'  => 'Tên đăng nhập đã tồn tại',
        //     'password_confirmation.confirmed' => 'Mật khẩu nhập lại chưa khớp'
        // ];

        // $validator = $request->validate($rules, $messages);

        // if($validator->fails()) {
        //     return redirect()->withError($validator)->withInput();
        // }

        $this->create($data);
        return redirect()->route('vouchers.index');
    }
}
