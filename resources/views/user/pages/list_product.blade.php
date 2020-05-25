@extends('user.index')
@section('content')
<div class="content">
    <!-- Product story -->
    <div class="container">
        <div class="product-story">
            <div class="row">
                <div class="col-12 pr-0 pl-0">
                    <img src="user_asset/images/product-type/slide.jpg" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Product -->
    <div class="product">
        <div class="container pt-5 pb-5">
            <div class="row">
                <!-- List-menu -->
                <div class="col-md-2 col-sm-12">
                    <h4> <a class="glyphicon glyphicon-modal-window" href="{{ route('danhSachSanPham')}}">Danh mục</a></h4>
                    <hr>
                    <ul class="list-menu pl-0" id="menu">
                        <div class="menu-left">
                            <li>
                                <h5 class="mb-1">Danh mục sản phẩm</h5>
                            </li>
                            @foreach($TypeUser as $ty)
                                @if($ty->productType_status == 1)
                                    <li>
                                    <li> <a data-toggle="collapse" href="#menu{{ $ty->productType_id }}" role="button" aria-expanded="false" aria-controls="menu1">
                                            {{$ty->productType_name}}<i class="fa fa-caret-down"></i></a>
                                    </li>
                                    <ul>
                                        @foreach($ty->getParent as $tu)
                                            @if($tu->productType_status == 1)
                                            <li class="collapse multi-collapse" id="menu{{ $ty->productType_id }}">
                                                <a href="{{route('danhSachSanPham',['productType_id' => $tu->productType_id, 'order'=> request('order', 'asc')])}}">{{$tu ->productType_name}}</a></li>
                                            @endif    
                                        @endforeach
                                    </ul>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                        <br>
                        <div class="menu-right">
                            <li>
                                <h5 class="mb-1">Thương hiệu</h5>
                            </li>
                            <ul class="click_filter hidden_filtercate">
                                @foreach($brand as $br)
                                    @if($br->brand_status == 1)
                                        <li>
                                            <a href="{{ route('danhSachSanPham',['brand_id' => $br->brand_id, 'from'
                                            => request('from', null), 'to' => request('to', null), 'productType_id'
                                            => request('productType_id', null), 'order' => request('order', 'asc')]) }}">{{$br->brand_name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <br>
                        <div class="menu-left">
                            <li>
                                <h5 class="box_filter">Mức giá</h5>
                            </li>
                            <ul class="click_filter hidden_filtercate">
                                <li>
                                    <a href="{{ route('danhSachSanPham',['brand_id' 
                                    => request('brand_id', null), 'from' => 0, 
                                    'to' => 500000, 'productType_id'
                                     => request('productType_id', null), 'order'
                                      => request('order', 'asc')]) }}">
                                        Dưới 5 trăm
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('danhSachSanPham',['brand_id' 
                                    => request('brand_id', null), 'from' => 500000, 
                                    'to' => 1000000, 'productType_id'
                                     => request('productType_id', null), 'order'
                                      => request('order', 'asc')]) }}">
                                        Từ 500k đến 1tr
                                    </a>
                                </li>
                                <li>

                                    <a href="{{ route('danhSachSanPham',['brand_id' 
                                    => request('brand_id', null), 'from' => 1000000, 
                                    'to' => 2000000, 'productType_id'
                                     => request('productType_id', null), 'order'
                                      => request('order', 'asc')]) }}">
                                        Từ 1tr đến 2tr
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('danhSachSanPham',['brand_id' 
                                    => request('brand_id', null), 'from' 
                                    => 2000000, 'to' 
                                    => 3000000, 'productType_id'
                                     => request('productType_id', null), 'order'
                                      => request('order', 'asc')]) }}">
                                        Từ 2tr đến 3tr
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('danhSachSanPham',[
                                        'brand_id' => request('brand_id', null), 
                                        'from' => 3000000, 
                                        'to' => 9999999999, 
                                        'productType_id' => request('productType_id', null), 
                                        'order' => request('order', 'asc')]) }}">
                                        Trên 3 triệu
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('danhSachSanPham',[
                                        'brand_id' => request('brand_id', null),
                                        'productType_id' => request('productType_id', null),
                                        'order' => request('order', 'asc')]) }}">
                                        Tất cả
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>

                <!-- About Product -->
                <div class="col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-6">
                            <h5>Có {{count($list_product)}} sản phẩm được tìm thấy</h5>
                        </div>
                        <div class="col-6 mnulist">
                            <form class="woocommerce-ordering" id="form_order" method="get" action="{{ route('danhSachSanPham',['brand_id' => request('brand_id', null), 'from' => request('from', null), 'to' => request('to', null), 'productType_id' => request('productType_id', null)]) }}">
                                <div class="orderby-wrapper pull-right">
                                    <select name="order" class="orderby" onchange="this.form.submit()">
                                        <option value="">Thứ tự mặc định</option>
                                        <option value="asc" @if(request('order') == 'asc') selected @endif>Thứ tự theo giá: thấp đến cao</option>
                                        <option value="desc" @if(request('order') == 'desc') selected @endif>Thứ tự theo giá: cao xuống thấp</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($list_product as $product)
                            @if($product->product_status == 1)
                                <div class="col-6 col-md-4 col-lg-3 pl-1 pr-1">
                                    <div class="product">
                                        <div class="card pt-2 pb-2 text-center box-product-list" style="width: 100%; height:388px !important">
                                            <a href="{{route('chitietsanphamUser', $product->product_id)}}">
                                                <img class="card-img-top p-2" src="user_asset/upload/product/{{$product->product_image}}" height="250px" alt="product" data-toggle="tooltip" title="">
                                            </a>
                                            <div class="card-body p-2">
                                                <a class="text-brand-name text-black text-decoration-none" href="#" data-toggle="tooltip" title="Neutrogena">
                                                    {!!$product->productType_name!!}
                                                </a>
                                                <p class="product-name mb-1 mt-1">
                                                    <a class="text-product-name text-black text-decoration-none" href="{{route('chitietsanphamUser',  $product->product_id)}}" data-toggle="tooltip" title="">
                                                        {{$product->product_title}}
                                                    </a>
                                                </p>
                                                <p class="card-text text-price" style="font-size:20px">{{number_format($product->product_price)}} đ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row text-center"><div>{{$list_product->links()}}</div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('.orderby').change(function() {
            $("#form_order").submit();
        })
    })
</script>
@stop