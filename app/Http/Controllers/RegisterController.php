<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use Session;

class RegisterController extends Controller
{
    public function getRegisterUser() {
        return view('user.pages.register');
    }

    public function getInformationUser() {
        $idCust = Session::get('logined');
        $cust = Customer::where('cust_id', $idCust)->first();
        $user = User::where('cust_id', $idCust)->first();
        return view('user.pages.informationUser', compact('cust', 'user'));
    }

    public function postRegisterUser(Request $req){
         $this->validate($req,
             [
                 'username'=>'bail|required|unique:users,username',                            
                 'custemail'=>'bail|required|email|unique:customer,cust_email',
                 'password'=>'bail|required|min:6|max:20',                
                 're_password'=>'bail|required|same:password',
                 'custname'=>'bail|required',
                 'custtel'=>'bail|required',
                 'custaddress'=>'bail|required'
             ],
             [
                 'username.required'=>'vui lòng nhập tên đăng nhập',
                 'username.unique'=>'username đã có người sử dụng',  
                 'password.required'=>'Vui lòng nhập mật khẩu',
                 're_password.same'=>'Mật khẩu không giống nhau',
                 'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                 'custname.required'=>'vui lòng nhập họ tên',
                 'custemail.required'=>'Vui lòng nhập email',
                 'custemail.cust_email'=>'Không đúng định dạng email',
                 'custemail.unique'=>'Email đã có người sử dụng',                 
                 'custtel.required'=>'vui lòng nhập số điện thoại liên hệ',
                 'custaddress.required'=>'vui lòng nhập địa chỉ giao hàng'
             ]);

        $cust = new Customer();       
        $cust->cust_name = $req->custname;
        $cust->cust_tel = $req->custtel;
        $cust->cust_email = $req->custemail;
        $cust->cust_add = $req->custaddress;
        $cust->save();
        
        $newCust = Customer::all()->last();

        $user = new User();
        $user->username = $req->username;
        $user->password = bcrypt($req->password);
        $user->role = 4;
        $user->cust_id = $newCust->cust_id;
        $user->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
}