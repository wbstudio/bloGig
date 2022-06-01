<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
    public function showLoginForm() {

        // return view('Admin.Index.login');
        return view('Admin.Auth.login');

    }

    public function login(Request $request) {

        $credentials = $request->only(['email', 'password']);

        if(\Auth::guard("admins")->attempt($credentials)) {
            return redirect('admin/home'); // ログインしたらリダイレクト
        }

        return back()->withErrors([
            'auth' => ['認証に失敗しました']
        ]);
    }

    public function adminHome() {
        return view('Admin.Auth.home');
    }
}
