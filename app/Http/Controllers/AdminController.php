<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller{
    public function getListAdmin() {
        $admins = User::all();
        return view('admin.admin.listAdmin',compact('admins'));
    }

    public function getEditAdmin($id) {
        $p = User::where('user_id', $id)->first();
        return view('admin.admin.editAdmin', compact('p'));
    }

    public function postEditAdmin(Request $request, $id) {
        User::where('user_id',$id)
            ->update([
                'username'=>$request->adname,
                'password'=>bcrypt($request->adpass),
                'role'=>$request->adrole,
            ]);


        
            return back()->with('edit_admin_success','Sửa thành công');
    }

    public function deleteAd($id){
        $p = User::where('user_id',$id);
        $p->delete();
        return back()->with('delete_admin_success','Xóa thành công');
    }

    public function getAddAdmin() {
        return view('admin.admin.addAdmin');
    }
    
    public function postAddAdmin(Request $request) {
        $admin = $request->all();

        $admin = new User;
        $admin->username = $request->adname;
        $admin->password = bcrypt($request->adpass);
        $admin->role = $request->adrole;
        $admin->save();
        return back()->with('create_admin_success','Đã tạo admin thành công');
    }
    


}