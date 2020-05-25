<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route user
Route::group(['prefix'=>'user'], function() {
    Route::get('index',[
        'as'=>'trangchuUser',
        'uses'=>'NewsController@getNewsHomepage'
    ]);

    Route::get('chi-tiet-san-pham/{id}',[
        'as'=>'chitietsanphamUser',
        'uses'=>'ProductController@getDetail'
    ]);

    Route::post('binh-luan-san-pham',[
        'as'=>'binhluansanpham',
        'uses'=>'CommentController@postComment'
    ]);

    Route::get('gio-hang',[
        'as'=>'giohang',
        'uses'=>'CartController@getCart'
    ]);

    Route::post('gio-hang',[
        'as'=>'giohang',
        'uses'=>'CartController@store'
    ]);

    Route::post('giam-so-luong',[
        'as'=>'giamsoluong',
        'uses'=>'CartController@qtyminus'
    ]);

    Route::post('tang-so-luong',[
        'as'=>'tangsoluong',
        'uses'=>'CartController@qtyplus'
    ]);

    Route::get('clearcart',[
        'as'=>'xoagiohang',
        'uses'=>'CartController@empty'
    ]);

    Route::delete('xoa-san-pham/{id}',[
        'as'=>'deleteItem',
        'uses'=>'CartController@deleteItem'
    ]);

    Route::get('thanh-toan',[
        'as'=>'thanhtoan',
        'uses'=>'OrderController@getPay'
    ]);

    Route::post('chi-tiet-dat-hang',[
        'as'=>'chitietdathang',
        'uses'=>'OrderDetailController@getUserOrderDetail'
    ]);

    //Đổ dữ liệu User
    Route::get('danh-sach-san-pham','UserTypeController@getListProduct')->name('danhSachSanPham');

    Route::get('loai-san-pham/{request?}',[
        'as'=>'loaisanpham',
        'uses'=>'UserTypeController@getProductTypeUser'
    ]);

    Route::get('tin-tuc',[
        'as'=>'tintuc',
        'uses'=>'NewsController@getNews'
    ]);

    Route::get('chi-tiet-tin-tuc/{n_id}',[
        'as'=>'chitiettintuc',
        'uses'=>'NewsController@getNewDetail'
    ]);

    Route::get('cau-hoi-thuong-gap',[
        'as'=>'cauhoithuonggap',
        'uses'=>'PageController@getQA'
    ]);

    Route::get('gioi-thieu',[
        'as'=>'gioithieu',
        'uses'=>'PageController@getAbout'
    ]);

    Route::get('cua-hang',[
        'as'=>'cuahang',
        'uses'=>'FeedbackController@getFeedback'
    ]);

    Route::get('dang-nhap',[
        'as'=>'dangnhapUser',
        'uses'=>'LoginController@getLoginUser'
    ]);

    Route::post('dang-nhap',[
        'as'=>'dangnhapUserTest',
        'uses'=>'LoginController@login'
    ]);

    Route::get('thoat',[
        'as'=>'thoatUser',
        'uses'=>'LoginController@logout'
    ]);

    Route::get('dang-ky',[
        'as'=>'dangkyUser',
        'uses'=>'RegisterController@getRegisterUser'
    ]);

    Route::post('dang-ky',[
	    'as'=>'dangkyPostUser',
	    'uses'=>'RegisterController@postRegisterUser'
    ]);

    Route::get('info/{cust_id}',[
        'as'=>'thongtin',
        'uses'=>'UserController@getInformationUser'
    ]);

    Route::post('editInfo',[
        'as'=>'suakhachhang',
        'uses'=>'UserController@editInformation'
    ]);
});

//Route admin
Route::group(['prefix'=>'admin'], function() {

    Route::get('index',[
        'as'=>'trangchuAdmin',
        'uses'=>'PageController@getAdminIndex'
    ]);

    Route::group(['prefix'=>'admin'], function() {
        Route::get('list',[
            'as'=>'danhsachadmin',
            'uses'=>'AdminController@getListAdmin'
        ]);

        Route::get('logout',[
            'as'=>'logoutad',
            'uses'=>'LoginController@logoutql'
        ]);
        Route::get('logoutsp',[
            'as'=>'logoutadsp',
            'uses'=>'LoginController@logoutqlsp'
        ]);
        Route::get('logoutdh',[
            'as'=>'logoutaddh',
            'uses'=>'LoginController@logoutqldh'
        ]);
        
        Route::get('edit/{id}',[
            'as'=>'suaadmin',
            'uses'=>'AdminController@getEditAdmin'
        ]);

        Route::post('postEditAdmin/{id}', [
            'as'=>'postsuaadmin',
            'uses'=>'AdminController@postEditAdmin']);

        Route::get('deleteAdmin/{id}', [
            'as'=>'xoaadmin',
            'uses'=>'AdminController@deleteAd']);            
        
        Route::get('add',[
            'as'=>'themadmin',
            'uses'=>'AdminController@getAddAdmin'
        ]);
        
        Route::post('postAddAdmin', [
            'as'=>'postthemadmin',
            'uses'=>'AdminController@postAddAdmin']);
    });

    //Brand Admin/brand/list
    Route::group(['prefix'=>'brand'], function() {
        Route::get('list',[
            'as'=>'danhsachncc',
            'uses'=>'BrandController@getListBrand'
        ]);

        Route::get('edit/{brand_id}',[
            'as'=>'suancc',
            'uses'=>'BrandController@getEditBrand'
        ]);
        Route::post('edit/{brand_id}',[
            'as'=>'suancc',
            'uses'=>'BrandController@postEditBrand'
        ]);

        Route::get('add',[
            'as'=>'themncc',
            'uses'=>'BrandController@getAddBrand'
        ]);
        Route::post('add',[
            'as'=>'themncc',
            'uses'=>'BrandController@postAddBrand'
        ]);

        Route::get('delete/{brand_id}',[
        'as'=>'xoancc',
        'uses' =>'BrandController@getDelete'
        ]);
    });

    // Admin ProductType
     Route::group(['prefix'=>'productType'], function() {
        Route::get('list',[
            'as'=>'danhsachloaisp',
            'uses'=>'TypeController@getListProductType'
        ]);

        Route::get('edit/{productType_id}',[
            'as'=>'sualoaisp',
            'uses'=>'TypeController@getEditProductType'
        ]);
        
        Route::post('edit/{productType_id}',[
            'as'=>'sualoaisp',
            'uses'=>'TypeController@postEditProductType'
        ]);

        Route::get('add',[
            'as'=>'themloaisp',
            'uses'=>'TypeController@getAddProductType'
        ]);
        Route::post('add',[
            'as'=>'themloaisp',
            'uses'=>'TypeController@postAddProductType'
        ]);

        Route::get('delete/{productType_id}',[
            'as'=>'xoaloaisp',
            'uses' =>'TypeController@getDelete'
            ]);
    });

    //Admin Product
    Route::group(['prefix'=>'product'], function() {
        Route::get('list',[
            'as'=>'danhsachsanpham',
            'uses'=>'ProductController@getListProduct'
        ]);

        Route::get('edit/{product_id}',[
            'as'=>'suasanpham',
            'uses'=>'ProductController@getEditProduct'
        ]);

        Route::post('edit/{product_id}',[
            'as'=>'suasanpham',
            'uses'=>'ProductController@postEditProduct'
        ]);

        Route::get('add',[
            'as'=>'themsanpham',
            'uses'=>'ProductController@getAddProduct'
        ]);

        Route::post('add',[
            'as'=>'themsanpham',
            'uses'=>'ProductController@postAddProduct'
        ]);

        Route::get('detail/{id}',[
            'as'=>'chitietsanpham',
            'uses'=>'ProductController@getDetailProduct'
        ]);

        Route::get('delete/{id}',[
            'as'=>'xoasanpham',
            'uses'=>'ProductController@deleteProduct'
        ]);

        Route::get('list-deleted',[
            'as'=>'sanphamdaxoa',
            'uses'=>'ProductController@getProductDeleted'
        ]);

        Route::get('undo/{id}',[
            'as'=>'hoantacsanpham',
            'uses'=>'ProductController@undoProduct'
        ]);
    });

    //Admin comment
    Route::group(['prefix'=>'comment'], function() {
        Route::get('list',[
            'as'=>'danhsachbinhluan',
            'uses'=>'CommentController@getListComment'
        ]);

        Route::get('reply/{id}',[
            'as'=>'traloibinhluan',
            'uses'=>'CommentController@getReplyComment'
        ]);

        Route::post('reply',[
            'as'=>'posttraloibinhluan',
            'uses'=>'CommentController@postReplyComment'
        ]);

        Route::get('delete/{id}',[
            'as'=>'xoabinhluan',
            'uses'=>'CommentController@deleteComment'
        ]);

        Route::get('list-deleted',[
            'as'=>'binhluandaxoa',
            'uses'=>'CommentController@getCommentDeleted'
        ]);

        Route::get('undo/{id}',[
            'as'=>'hoantacbinhluan',
            'uses'=>'CommentController@undoComment'
        ]);

        Route::get('permanentlyDeleteComment/{id}',[
            'as'=>'xoavinhvienbinhluan',
            'uses'=>'CommentController@permanentlyDeleteComment'
        ]);
    });

    //Admin order
    Route::group(['prefix'=>'order'], function() {
        Route::get('list',[
            'as'=>'danhsachdonhang',
            'uses'=>'OrderAdminController@getListOrder'
        ]);

        Route::get('edit/{id}',[
            'as'=>'suadonhang',
            'uses'=>'OrderAdminController@getEditOrder'
        ]);

        Route::post('updateOrder/{id}',[
            'as'=>'capnhatdonhang',
            'uses'=>'OrderAdminController@updateOrder'
        ]);

        Route::get('deleteOrder/{id}',[
            'as'=>'xoadonhang',
            'uses'=>'OrderAdminController@deleteOrder'
        ]);

        Route::get('permanentlyDeleteOrder/{id}',[
            'as'=>'xoavinhviendonhang',
            'uses'=>'OrderAdminController@permanentlyDeleteOrder'
        ]);

        Route::get('detail/{id}',[
            'as'=>'chitietdonhang',
            'uses'=>'OrderAdminController@getDetailOrder'
        ]);

        Route::get('revenue',[
            'as'=>'doanhthu',
            'uses'=>'OrderAdminController@getRevenue'
        ]);

        Route::get('list-deleted',[
            'as'=>'donhangdaxoa',
            'uses'=>'OrderAdminController@getOrderDeleted'
        ]);

        Route::get('undo/{id}',[
            'as'=>'hoantacdonhang',
            'uses'=>'OrderAdminController@undoOrder'
        ]);
    });

    Route::group(['prefix'=>'customer'], function() {
        Route::get('list',[
            'as'=>'danhsachkhachhang',
            'uses'=>'CustomerController@getListCustomer'
        ]);

        Route::get('delete/{cust_id}',[
            'as'=>'xoakhachhang',
            'uses' =>'CustomerController@getDelete'
        ]);
    });

 //feedback
    Route::group(['prefix'=>'feedback'], function() {
        Route::get('list',[
            'as'=>'danhsachphanhoi',
            'uses'=>'FeedbackController@getlistFeedback'
        ]);
        Route::get('delete/{fb_id}',[
            'as'=>'xoafeedback',
            'uses' =>'FeedbackController@getDelete'
            ]);
        Route::get('add',[
            'as'=>'themphanhoi',
            'uses'=>'FeedbackController@getFeedback'
        ]);

        Route::post('add',[
            'as'=>'themphanhoi',
            'uses'=>'FeedbackController@postFeedback'
        ]);
        
    });

    Route::group(['prefix'=>'news'], function() {
        Route::get('list',[
            'as'=>'danhsachbantin',
            'uses'=>'NewsController@getListNews'
        ]);

        Route::get('edit/{n_id}',[
            'as'=>'suabantin',
            'uses'=>'NewsController@getEditNews'
        ]);
        Route::post('edit/{n_id}', [
            'as'=>'suabantin',
            'uses'=>'NewsController@postEditNews']);

        Route::get('deleteNews/{id}', [
            'as'=>'xoabantin',
            'uses'=>'NewsController@deleteNews']); 
               
        Route::get('add',[
            'as'=>'thembantin',
            'uses'=>'NewsController@getAddNews'
        ]);
        Route::post('postAddNews', [
            'as'=>'postthembantin',
            'uses'=>'NewsController@postAddNews']);
    });
});