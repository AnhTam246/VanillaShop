<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Session;

class OrderDetailController extends Controller
{
    //User
    public function getUserOrderDetail(Request $res) {
        $this->validate(
            $res,
            [
                'email' => 'bail|required|email|max:100',
                'name' => 'bail|required|max:100',
                'phone' => 'bail|required|min:10|max:11',
                'address' => 'bail|required|max:500',
                'note' => 'bail|max:255',
            ],
            [
                'email.required' => 'Chưa nhập email',
                'email.email' => 'Chưa đúng kiểu email',
                'email.max' => 'Email không được quá 100 kí tự',
                'name.required' => 'Chưa nhập họ và tên',
                'name.max' => 'Họ và tên không được quá 100 kí tự',
                'phone.required' => 'Chưa nhập số điện thoại',
                'phone.min' => 'Số điện thoại không được nhỏ hơn 10 kí tự',
                'phone.max' => 'Số điện thoại không được lớn hơn 11 kí tự',
                'address.required' => 'Chưa nhập địa chỉ',
                'address.max' => 'Địa chỉ không được lớn hơn 500 kí tự',
                'note.max' => 'Ghi chú không được lớn hơn 255 kí tự',
            ]
        );
        
        if(Session::has('logined')) {
            //Get id customer
            $idCust = Session::get('logined');
            //Get customer order
            $custOrder = Customer::where('cust_id',$idCust)->first();
            $totalPriceDiscount = Cart::priceTotal(0,'','') * 95 / 100;
            //Get all product on cart
            $productsOnCart = Cart::content();
            //Check quantity product
            foreach ($productsOnCart as $productOnCart) {
                $productUpdateQty = Product::where('product_id',$productOnCart->id)->first();
                $newQty = $productUpdateQty->product_quantity - $productOnCart->qty;
                if($newQty < 0) {
                    return back()->with('quantity_not_enough',"Sản phẩm $productUpdateQty->product_title trong kho chỉ còn $productUpdateQty->product_quantity sản phẩm, vui lòng giảm số lượng, xin lỗi quý khách vì sự bất tiện này!");
                }
            }
            //Create new order
            $order = new Order;
            $order->cust_id = $idCust;
            $order->cust_tel = $res->phone;
            $order->cust_name = $res->name;
            $order->cust_email = $res->email;
            $order->cust_add = $res->address;
            if($custOrder->cust_mark > 10) {
                $order->order_price = $totalPriceDiscount;
            } else {
                $order->order_price = Cart::priceTotal(0,'','');
            }
            $order->order_note = $res->note;
            $order->order_confirm = 0;
            $order->order_delivery = 0;
            $order->order_status = 1;
            $order->save();

            //Update mark of customer
            $custUpdateMark = Customer::where('cust_id', $idCust)->first();
            $newMark = $custUpdateMark->cust_mark + 1;
            Customer::where('cust_id',$idCust)
                    ->update([
                        'cust_mark'=>$newMark
                    ]);
            
            //Get last order
            $newOrder = Order::all()->last();
            
            //Add orderDetail for product on cart
            foreach ($productsOnCart as $productOnCart) {
                $orderDetail = new OrderDetail;
                $orderDetail->orderDetail_price = $productOnCart->price;
                $orderDetail->orderDetail_quantity = $productOnCart->qty;
                $orderDetail->product_id = $productOnCart->id;
                $orderDetail->order_id = $newOrder->order_id;
                $orderDetail->product_name = $productOnCart->name;
                $orderDetail->save();
                
                //Update quantity product
                $productUpdateQty = Product::where('product_id',$orderDetail->product_id)->first();
                $newQty = $productUpdateQty->product_quantity - $productOnCart->qty;
            
                Product::where('product_id',$orderDetail->product_id)
                    ->update([
                        'product_quantity'=>$newQty
                    ]);
            }
            //Get orrer detail id
            $orderDetails = OrderDetail::where('order_id',$newOrder->order_id)->get();

            //Get total price order
            if($custOrder->cust_mark > 10) {
                $totalPrice = $totalPriceDiscount;
                //Delete cart
                Cart::destroy();
                Session::flash('discount_mark', 'Chúc mừng bạn đã được giảm 5% trên tổng hóa đơn với số lần đặt hàng trên 10 lần!!');
                return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
            } else {
                $totalPrice = Cart::priceTotal(0,'','');
                //Delete cart
                Cart::destroy();
                return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
            }
        } 
        else {
            //Get all product on cart
            $productsOnCart = Cart::content();
            //Check quantity product
            foreach ($productsOnCart as $productOnCart) {
                $productUpdateQty = Product::where('product_id',$productOnCart->id)->first();
                $newQty = $productUpdateQty->product_quantity - $productOnCart->qty;
                if($newQty < 0) {
                    return back()->with('quantity_not_enough',"Sản phẩm $productUpdateQty->product_title trong kho chỉ còn $productUpdateQty->product_quantity sản phẩm, vui lòng giảm số lượng, xin lỗi quý khách vì sự bất tiện này!");
                }
            }

            $selectionRegionOptions = [1 => 'Thành phố Cần Thơ', 2 => 'Thành phố Đà Nẵng', 3 => 'Thành phố Hà Nội', 4 => 'Thành phố Hải Phòng',
            5 => 'Thành phố Hồ Chí Minh', 6 => 'Tỉnh An Giang', 7 => 'Tỉnh Bà Rịa-Vũng Tàu', 8 => 'Tỉnh Bắc Giang', 9 => 'Tỉnh Bắc Kạn', 10 => 'Tỉnh Bạc Liêu', 11 => 'Tỉnh Bắc Ninh', 12 => 'Tỉnh Bến Tre', 13 => 'Tỉnh Bình Định', 14 => 'Tỉnh Bình Dương', 
            15 => 'Tỉnh Bình Phước', 16 => 'Tỉnh Bình Thuận', 17 => 'Tỉnh Cà Mau', 18 => 'Tỉnh Cao Bằng', 19 => 'Tỉnh Đắk Lắk', 20 => 'Tỉnh Đắk Nông', 21 => 'Tỉnh Điện Biên', 22 => 'Tỉnh Đồng Nai', 23 => 'Tỉnh Đồng Tháp', 24 => 'Tỉnh Gia Lai', 25 => 'Tỉnh Hà Giang', 26 => 'Tỉnh Hà Nam', 
            27 => 'Tỉnh Hà Tĩnh', 28 => 'Tỉnh Hải Dương', 29 => 'Tỉnh Hậu Giang', 30 => 'Tỉnh Hòa Bình', 31 => 'Tỉnh Hưng Yên', 32 => 'Tỉnh Khánh Hòa', 33 => 'Tỉnh Kiên Giang', 34 => 'Tỉnh Kon Tum', 35 => 'Tỉnh Lai Châu', 36 => 'Tỉnh Lâm Đồng', 37 => 'Tỉnh Lạng Sơn', 38 => 'Tỉnh Lào Cai', 39 => 'Tỉnh Long An', 40 => 'Tỉnh Nam Định', 41 => 'Tỉnh Nghệ An', 42 => 'Tỉnh Ninh Bình', 43 => 'Tỉnh Ninh Thuận', 
            44 => 'Tỉnh Phú Thọ', 45 => 'Tỉnh Phú Yên', 46 => 'Tỉnh Quảng Bình', 47 => 'Tỉnh Quảng Nam', 48 => 'Tỉnh Quảng Ngãi', 49 => 'Tỉnh Quảng Ninh', 50 => 'Tỉnh Quảng Trị', 51 => 'Tỉnh Sóc Trăng', 52 => 'Tỉnh Sơn La', 53 => 'Tỉnh Tây Ninh', 54 => 'Tỉnh Thái Bình', 55 => 'Tỉnh Thái Nguyên',
            56 => 'Tỉnh Thanh Hóa', 57 => 'Tỉnh Thừa Thiên Huế', 58 => 'Tỉnh Tiền Giang', 59 => 'Tỉnh Trà Vinh', 60 => 'Tỉnh Tuyên Quang', 61 => 'Tỉnh Vĩnh Long', 62 => 'Tỉnh Vĩnh Phúc', 63 => 'Tỉnh Yên Bái'];
            $selectedRegion = $selectionRegionOptions[$res->region];
            $district = $res->distric;
            $add = $res->address;
            $address = $add.", ".$district.", ".$selectedRegion;
    
            $order = new Order;
            $order->cust_tel = $res->phone;
            $order->cust_name = $res->name;
            $order->cust_email = $res->email;
            $order->cust_add = $address;
            $order->order_price = Cart::priceTotal(0,'','');
            $order->order_note = $res->note;
            $order->order_confirm = 0;
            $order->order_delivery = 0;
            $order->order_status = 1;
            $order->save();
            $newOrder = Order::all()->last();
    
            foreach ($productsOnCart as $productOnCart) {
                $orderDetail = new OrderDetail;
                $orderDetail->orderDetail_price = $productOnCart->price;
                $orderDetail->orderDetail_quantity = $productOnCart->qty;
                $orderDetail->product_id = $productOnCart->id;
                $orderDetail->order_id = $newOrder->order_id;
                $orderDetail->product_name = $productOnCart->name;
                $orderDetail->save();
    
                $productUpdateQty = Product::where('product_id',$orderDetail->product_id)->first();
                $newQty = $productUpdateQty->product_quantity - $productOnCart->qty;

                Product::where('product_id',$orderDetail->product_id)
                    ->update([
                        'product_quantity'=>$newQty
                    ]);
            }
            $orderDetails = OrderDetail::where('order_id',$newOrder->order_id)->get();
            $totalPrice = Cart::priceTotal(0,'','');
            Cart::destroy();
            return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
        } 
    }
}