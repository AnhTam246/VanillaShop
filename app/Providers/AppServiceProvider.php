<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Brand;
use App\Product;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('user/header', function ($view) {
            $brand = Brand::all();
            $TypeUser = ProductType::with('getParent')->whereNull('parent_id')->get();
            $loaisp = ProductType::all();

            if(Session::has('logined')) {
                $cust_id = Session::get('logined');
                $view->with('cust_id', $cust_id);
            }

            $view->with('brand', $brand);
            $view->with('TypeUser', $TypeUser);
            $view->with('loaisp', $loaisp);

        });
    }
}
