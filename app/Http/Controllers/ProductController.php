<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Comment;
use App\Product;
use App\Brand;
use App\ProductType;

class ProductController extends Controller
{
    //User
    public function getDetail($id) {
        $slides = Slide::where('product_id',$id)->get();
        $comments = Comment::where([
            ['product_id',$id], 
            ['cment_status',1]
        ])->get();
        $product = Product::where('product_id','=',$id)->first();
        $brand = Brand::where('brand_id',$product->brand_id)->first();
        $productType = ProductType::where('productType_id',$product->productType_id)->first();
        $productSames = Product::where('productType_id',$product->productType_id)->get();
        $brands = Brand::all();
        
        return view('user.pages.detail',compact('slides','comments','product','brand','productType','productSames','brands'));
    }

    //Admin
    public function getListProduct() {
        $products = Product::where('product_status', 1)->get();
        $brands = Brand::all();
        $productTypes = ProductType::all();
        return view('admin.product.listProduct',compact('products','brands','productTypes'));
    }

    public function getDetailProduct($id) {
        $slides = Slide::where('product_id',$id)->get();
        $product = Product::where('product_id','=',$id)->first();
        $brand = Brand::where('brand_id',$product->brand_id)->first();
        $productType = ProductType::where('productType_id',$product->productType_id)->first();
        return view('admin.product.detailProduct',compact('product','brand','productType','slides'));
    }

    public function getProductDeleted() {
        $products = Product::where('product_status', 0)->get();
        $brands = Brand::all();
        $productTypes = ProductType::all();
        return view('admin.product.productDeleted', compact('products','brands','productTypes'));
    }

    public function deleteProduct($id) {
        Product::where('product_id', $id)
                ->update([
                    'product_status'=> 0
                ]);

        return back()->with('delete_success', 'Đã xóa sản phẩm!!!');
    }

    public function undoProduct($id) {
        Product::where('product_id', $id)
        ->update([
            'product_status'=> 1
        ]);
        return back()->with('undo_success', 'Đã hoàn tác sản phẩm!!!');
    }


    //A Hoai
    public function getAddProduct() {
        return view('admin.product.addProduct');
    }

    public function getEditProduct($product_id) {
        $product = Product::find($product_id);
        return view('admin.product.editProduct',['product'=> $product]);
    }

    public function postEditProduct(Request $request, $product_id) {
        $product = Product::find($product_id);
        $slide = Slide::find($product_id);
        $this->validate(
             $request,
            [
                'txtTieuDe' => 'required|min:3|max:100',
                'txtHieu' =>'required',
                'txtTheLoai'=>'required',
                'txtGia'=>'required',
                'txtIntro'=>'required',
                'SoLuong'=>'required',
                //'fImages'=>'required',
            ],
            [
                'txtTieuDe.required' => 'Bạn chưa nhập tên thể loại',
                'txtTieuDe.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'txtTieuDe.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'txtHieu.requered'=>'Bạn chưa nhập Hiệu',
                'txtTheLoai.requered'=>'Bạn chưa nhập Hiệu',
                'txtGia.requered'=>'Bạn chưa nhập Hiệu',
                'txtIntro.requered'=>'Bạn chưa nhập Hiệu',
                'SoLuong.requered'=>'Bạn chưa nhập Hiệu',
                //'fImages.required'=>'Ảnh không được trống',
            ]
        );

        $product->product_title = $request->txtTieuDe;
        $product->product_price = $request->txtGia;
        $product->product_description = $request->txtIntro;
        $product->product_highlight = $request->txtNoiBat;
        $product->product_quantity= $request->SoLuong;
        $product->brand_id = $request->txtHieu;
        $product->productType_id= $request->txtTheLoai;
        $product->product_status = $request->rdoStatus;

        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
    //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/product/edit')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/product/",$name);
            //unlink("upload/sanpham/".$product->product_image);
            $product->product_image =$name;
        }
        $product->save();

        if ($request->hasFile('fImages1')) {
            $file1 = $request->file('fImages1');
            $duoi1 =$file1->getClientOriginalExtension();
            if($duoi1 !='jpg' && $duoi1 !='png' && $duoi1 !='jpeg'){
                return Redirect('admin/product/add')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name1 =$file1 ->getClientOriginalName();
            $file1->move("user_asset/upload/slide/",$name1);
            $slide->image = $name1;
        }
       
        //$slide ->image = $request-> fImages1;
        $slide ->product_id =$request = $product->product_id;
        $slide ->save();

        return redirect('admin/product/edit/'.$product_id)->with('thongbao', 'Sửa thành công');
    }

    public function postAddProduct(Request $request) {
        $this->validate(
            $request,
            [
                'txtTieuDe' => 'required|unique:Product,product_title|min:3|max:200',
                'txtHieu' =>'required',
                'txtTheLoai'=>'required',
                'txtGia'=>'required',
                'txtIntro'=>'required',
                'SoLuong'=>'required',
                'fImages'=>'required',
            ],
            [
                'txtTieuDe.required' => 'Bạn chưa nhập tên Tiêu Đề',
                'txtTieuDe.unique'=>'Tên Tiêu Đề đã tồn tại',
                'txtTieuDe.min' => 'Tên Tiêu đề phải có độ dài từ 3 cho đến 200 ký tự',
                'txtTieuDe.max' => 'Tên Tiêu đề phải có độ dài từ 3 cho đến 200 ký tự',
                'txtHieu.requered'=>'Bạn chưa nhập Hiệu',
                'txtTheLoai.requered'=>'Bạn chưa nhập Thể Loại',
                'txtGia.requered'=>'Bạn chưa nhập Giá',
                'txtIntro.requered'=>'Bạn chưa nhập Mô tả',
                'SoLuong.requered'=>'Bạn chưa nhập Số lượng',
                'fImages.required'=>'Ảnh không được trống',
            ]
        );

        $product = new Product();
        $product->product_title = $request->txtTieuDe;
        $product->product_price = $request->txtGia;
        $product->product_description = $request->txtIntro;
        $product->product_highlight = $request->txtNoiBat;
        $product->product_quantity= $request->SoLuong;
        $product->brand_id = $request->txtHieu;
        $product->productType_id= $request->txtTheLoai;
        $product->product_status = $request->rdoStatus;

        if ($request->hasFile('fImages')) {
            $file = $request->file('fImages');
    //kiem tra duoi anh
            $duoi =$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return Redirect('admin/product/edit')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name =$file ->getClientOriginalName();
            $file->move("user_asset/upload/product/",$name);
            //unlink("upload/sanpham/".$product->product_image);
            $product->product_image =$name;
        }
        else{
            $product->product_image ="";
        }

        $product->save();
        //
       $slide = new Slide();

        if ($request->hasFile('fImages1')) {
            $file1 = $request->file('fImages1');
            $duoi1 =$file1->getClientOriginalExtension();
            if($duoi1 !='jpg' && $duoi1 !='png' && $duoi1 !='jpeg'){
                return Redirect('admin/product/add')->with('loi','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
            }
            $name1 =$file1->getClientOriginalName();
            $file1->move("user_asset/upload/slide/",$name1);
            $slide->image = $name1;
        }
       
        //$slide ->image = $request-> fImages1;
        $slide ->product_id =$request = $product->product_id;
        $slide ->save();

        
        return redirect('admin/product/add')->with('thongbao', 'Thêm thành công');
    }

}