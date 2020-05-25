<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use Session;

class LoginController extends Controller
{
    public function getLoginUser() {
        return view('user.pages.login');
    }

    public function login(Request $request) {
        $data = $request->only('username', 'password');
        if(Auth::attempt($data)){
            $user = User::where('username', $request->username)->first();
            if($user->role == 4) {
                $idUser = $user->cust_id;
                Session::put('logined', $idUser);
                return redirect()->route('trangchuUser')->with(['login_success1'=>'Đăng nhập thành công!!!']);
            }
            if($user->role == 1) {
                Session::put('ql', 1);
                return redirect()->route('trangchuAdmin')->with(['login_success1'=>'Đăng nhập thành công!!!']);
            }
            if($user->role == 2){
                Session::put('qlsp', 2);
                return redirect()->route('trangchuAdmin')->with(['login_success1'=>'qlsp Đăng nhập thành công!!!']);
            }
            if($user->role == 3) {
                Session::put('qldh', 3);
                return redirect()->route('trangchuAdmin')->with(['login_success1'=>'Đăng nhập thành công!!!']);
            }
        } else {
            return back()->with(['login_fail1'=>'Thông tin đăng nhập không chính xác!!!']);
        }
    }

    public function logout() {
        Session::forget('logined');
        return redirect()->route('dangnhapUserTest');
    }
    public function logoutql() {
        Session::forget('ql');
        return redirect()->route('dangnhapUserTest');
    }
    public function logoutqlsp() {
        Session::forget('qlsp');
        return redirect()->route('dangnhapUserTest');
    }
    public function logoutqldh() {
        Session::forget('qldh');
        return redirect()->route('dangnhapUserTest');
    }
}