<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Brand;

class BrandController extends Controller
{
    //User


    //Admin
    //A Hoai
    public function getListBrand() {
        $brand = Brand::all();
        return view('admin.brand.listBrand',['brand'=> $brand]);
    }

    public function getEditBrand($brand_id) {
        $brand = Brand::find($brand_id);
        return view('admin.brand.editBrand',['brand'=> $brand]);
    }

    public function postEditBrand(Request $request, $brand_id) {
        $brand = Brand::find($brand_id);
        $this->validate(
            $request,
            [
                'txtName' => 'required|min:3|max:300',
                //'txtEmail'=>'required',
                //'fImages'=>'required',
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên Nhà Cung Cấp',
                //'txtName.unique' => 'Tên thể loại đã tồn tại',
                'txtName.min' => 'Tên Nhà Cung cấp phải có độ dài từ 3 cho đến 300 ký tự',
                'txtName.max' => 'Tên Nhà Cung cấp phải có độ dài từ 3 cho đến 300 ký tự',
               // 'txtEmail.required'=>'Email Không được trống',
               // 'fImages.required'=>'Logo không được trống',
            ]
        );

        $brand->brand_name = $request->txtName;
        $brand->brand_email = $request->txtEmail;
        $brand->brand_description = $request->txtIntro;
       // $brand->brand_logo = $request->fImages;
        $brand ->brand_status = $request->rdoStatus;

        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
            //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/brand/edit')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/nhacc",$name);
            //unlink("user_asset/upload/nhacc".$brand->brand_logo);
            $brand->brand_logo =$name;
           
        }
        
        $brand->save();
        return redirect('admin/brand/edit/'.$brand_id)->with('thongbao', 'Sửa thành công');
    }

    public function getAddBrand() {
        return view('admin.brand.addBrand');  
    }

    public function postAddBrand(Request $request) {
        $this->validate(
            $request,
            [
                'txtName' => 'required|unique:Brand,brand_name|min:3|max:300',
                'fImages'=>'unique:Brand,brand_logo',
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên Nhà Cung Cấp',
                'txtName.unique' => 'Tên Nhà Cung cấp đã tồn tại',
                'txtName.min' => 'Tên Nhà Cung cấp phải có độ dài từ 3 cho đến 300 ký tự',
                'txtName.max' => 'Tên Nhà Cung cấp phải có độ dài từ 3 cho đến 300 ký tự',
                'fImages.unique'=>'Tên ảnh logo bị trùng',
            ]
        );

        $brand = new Brand;
        $brand->brand_name = $request->txtName;
        $brand->brand_email = $request->txtEmail;
        $brand->brand_description = $request->txtIntro;
       //$brand->brand_logo = $request->fImages;
        $brand ->brand_status = $request->rdoStatus;

        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
    //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/brand/add')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/nhacc",$name);
            $brand->brand_logo =$name;
           
        }else{
            $brand->brand_logo ="";
        }

        $brand->save();
        return redirect('admin/brand/add')->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($brand_id)
    {
        $brand = Brand::find($brand_id);//
        $brand->delete();

        return redirect('admin/brand/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}