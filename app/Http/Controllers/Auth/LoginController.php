<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function showLoginForm()
    {
        # code...
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'captcha' => ['required', 'captcha'],
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $credentials = $request->only('email', 'password',);

        if (Auth::attempt($credentials)) {
            // 通过认证..
            return redirect()->intended('/');
        }
    }

    public function logout()
    {
        # code...
        Auth::logout();
        return redirect()->intended('/');
    }
}
