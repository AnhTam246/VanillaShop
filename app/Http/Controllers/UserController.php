<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use Session;

class UserController extends Controller
{ 
    public function getUserIndex() {
        return view('user.pages.homepage');
    }

    public function getInformationUser($cust_id) {
        $customer = Customer::find($cust_id);
        $users = User::where('cust_id',$cust_id)->first();
        return view('user.pages.informationUser',['customer'=>$customer,'users'=>$users]);
    }

    public function editInformation(Request $request) {
        $this->validate(
            $request,
            [
                'txtPass' => 'bail|required',
            ],
            [
                'txtPass.required' => 'Chưa nhập mật khẩu'
            ]
        );
        $idCust = $request->idCust;

        User::where('cust_id', $idCust)
            ->update([
                'username' =>$request->txtName,
                'password' => bcrypt($request->txtPass)
            ]);

        Customer::where('cust_id', $idCust)
            ->update([
                'cust_name' => $request->txtHoten,
                'cust_tel' => $request->txtTel,
                'cust_email' => $request->txtEmail,
                'cust_add' => $request->txtDiachi
            ]);
        return back();
    }
   
}    
