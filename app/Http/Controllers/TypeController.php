<?php

namespace App\Http\Controllers;
use App\Brand;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TypeController extends Controller
{
    public function getListProductType() {
        $productType = ProductType::all();
        return view('admin.productType.listProductType',['productType'=> $productType]);
    }

    public function getEditProductType($productType_id) {
        $productType = ProductType::find($productType_id);
        return view('admin.productType.editProductType',['productType'=> $productType]);
    }
    public function postEditProductType(Request $request, $productType_id) {
        $productType = ProductType::find($productType_id);
        $this->validate(
            $request,
            [
                'txtName' => 'required|min:3|max:100',
                //'txtEmail'=>'required',
                //'fImages'=>'required',
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên thể loại',
                //'txtName.unique' => 'Tên thể loại đã tồn tại',
                'txtName.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'txtName.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
               // 'txtEmail.required'=>'Email Không được trống',
               // 'fImages.required'=>'Logo không được trống',
            ]
        );

        $productType->productType_name = $request->txtName;
        $productType->productType_description = $request->txtIntro;
        $productType->productType_status = $request->rdoStatus;
        $productType->parent_id = $request->txtParent;

        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
    //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/productType/edit')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/loaisanpham/",$name);
            //unlink("user_asset/upload/loaisanpham/".$productType->productType_image);
            $productType->productType_image =$name;
        }
        $productType->save();
        return redirect('admin/productType/edit/'.$productType_id)->with('thongbao', 'Sửa thành công');
    }

    public function getAddProductType() {
        $list_parent = ProductType::with('getParent')->where('parent_id',null)->get();
        return view('admin.productType.addproductType',[
            'list_parent' => $list_parent
        ]);  
    }

    public function postAddProductType(Request $request) {
        $this->validate(
            $request,
            [
                'txtName' => 'required|unique:ProductType,productType_name|min:3|max:100',
               // 'fImages'=>'required',
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên thể loại',
                'txtName.unique' => 'Tên thể loại đã tồn tại',
                'txtName.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'txtName.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
               // 'fImages.required'=>'Hình ảnh không được trống',
            ]
        );

        $productType = new ProductType();
        $productType->productType_name = $request->txtName;
        $productType->productType_description = $request->txtIntro;
        $productType ->productType_status = $request->rdoStatus;
       // $productType->productType_image = $request->fImages;
        $productType->parent_id = $request->txtParent;
        //kiem tra va luu hinh anh
        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
        //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/productType/add')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/loaisanpham/",$name);
            $productType->productType_image =$name;
           
        }else{
            $productType->productType_image ="";
        }

        $productType->save();
        return redirect('admin/productType/add')->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($productType_id)
    {
        $productType = ProductType::find($productType_id);
        $productType->delete();

        return redirect('admin/productType/list')->with('thongbao', 'Bạn đã xóa thành công');
    }

}