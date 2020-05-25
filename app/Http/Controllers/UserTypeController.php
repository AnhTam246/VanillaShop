<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Brand;
use App\Product;



class UserTypeController extends Controller
{
    public function getListProduct(Request $request){
        $list_product = new Product();
        $TypeUser = ProductType::with('getParent')->whereNull('parent_id')->get();
        $brand = Brand::all();
        $loaisp = ProductType::all();

      //  $order = in_array($request ->order, ['desc','asc'])? $request->order:'desc'; 

        $prices = [
            is_numeric($request->from) ? $request->from : 1000,
            is_numeric($request->to) ? $request->to : 10000000,
        ];

        $list_product = Product::whereBetween('product_price', $prices);

        if ($request->has('productType_id') && $request->get('productType_id', null)) {
            $list_product = $list_product->where('productType_id', $request->productType_id);
        }

        if ($request->has('brand_id') && $request->get('brand_id', null)) {
            // http://127.0.0.1:8000/product/list?type_id=1
            $list_product = $list_product->where('brand_id', $request->brand_id);
        }

        if($request->has('search') && $request->get('search', null)){
            $list_product = $list_product
            ->where('product_title','like','%'.trim($request->search).'%')
            ->where('product_title','like','%'.trim($request->search).'%');
        }
          

        $list_product = $list_product->orderBy('product_price', $request->order ?? 'asc')->paginate(12);

  
        return view('user.pages.list_product',[
            // truyền các tham số cho bên view nhận
            'list_product' => $list_product,
            'TypeUser' => $TypeUser,
            'brand' => $brand,
            'loaisp'=>$loaisp,
        ]);

    }

    // public function getProductTypeUser($type)
    // {
    //     $TypeUser = ProductType::all();
    //     $brand = Brand::all();
    //     $product = Product::all();

    //     $nhacc = Brand::find($type);
    //     $sp_nhacc = Product::where('brand_id', $type)->paginate(12);

    //     return view('user.pages.productType', compact(
    //         'TypeUser',
    //         'brand',
    //         'product',
    //         'sp_nhacc',
    //         'nhacc'
    //     ));
    // }


    public function getProductTypeUser1($type)
    {
        $TypeUser = ProductType::all();
        $brand = Brand::all();
        $product = Product::all();

        $loaisp = ProductType::find($type);
        $sp_theoloai = Product::where('productType_id', $type)->paginate(12);

        return view('user.pages.productBrand', compact(
            'TypeUser',
            'brand',
            'product',
            'loaisp',
            'sp_theoloai'
        ));
    }
}
