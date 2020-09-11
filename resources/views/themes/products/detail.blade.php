@extends('themes.productsdetail')

@section('page_title')
    Trang chủ
@endsection
@section('main-content')
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-7">
                    <div class="product-img clearfix">
                        <div class="easyzoom easyzoom--adjacent easyzoom--with-thumbnails">
                            <a href="{{asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)}}">
                                <img src="{{asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)}}" alt="" class="imgresponsive"/>
                            </a>
                        </div>
                    </div>
                    <ul id="thumblist" class="thumbnails clearfix" >
                        @foreach($files_images as $key=>$url)
                        <li @if($key==0)class="active" @endif>
                            <a href='{{asset('public/images/'.$url)}}' data-standard="{{asset('public/images/'.$url)}}" >
                                <img src='{{asset('public/images/'.$url)}}'>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <?php
                $checktime = \App\Http\Controllers\Controller::checkendtime($detailproduct->starttime,$detailproduct->endtime);
                               ?>
                <div class="col-sm-5">
                    <h1 class="product-title">{{$detailproduct->name}}</h1>
                                       @if($detailproduct->cates->parent!=null)
                    <h2 class="product-subtitle">{{$detailproduct->cates->parent->name}}-{{$detailproduct->cates->name}}</h2>
                    @else
                        <h2 class="product-subtitle">{{$detailproduct->cates->name}}</h2>
                    @endif
                    @if($checktime==1)
                        <div class="price">Giá sàn: <span class="old">{{number_format($detailproduct->price,8,',','.')}} ETH</span></div>
                    <div class="product-button">
                        <input class="p-btn btn-qty" required type="number" step="0.01" min="{{$detailproduct->price}}" name="quantity" id="quantity" value="{{$detailproduct->price}}">
                        <button class="p-btn add-to-cart" id="add_cart" value="{{$detailproduct->id}}">ĐẤU GIÁ</button>
                    </div>
                    @endif
                    <div class="product-links">
                        @if($checktime==1)

                            <button class="p-btn startus-openbind"><b>ĐANG MỞ ĐẤU GIÁ</b></button>
                        @endif
                            @if($checktime==2)

                            <button class="p-btn startus-endbind"><b>KẾT THÚC ĐẤU GIÁ</b></button>
                            @endif
                            @if($checktime==0)
                            <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                            @endif

                        <a href="{!! $settings['linkfanpage']!!}" class="facebook" TARGET="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{!! $settings['instagram']!!}" TARGET="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="product-shipping"> {!!$detailproduct->short!!}</div>
                </div><!--/.col-->
            </div><!-- /.row-->
            <div class="product-info-more">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)}}" alt="" class="imgresponsive"/>
                    </div>
                    <div class="col-sm-8">
                        <h3 class="product-title">{{$detailproduct->name}}</h3>
                        <div class="pi-pdpmainbody">
                            {!!$detailproduct->long!!}
                        </div>
                    </div><!--/.col-->
                </div><!--/row-->
            </div><!--/.product-info-more-->
        </div><!-- /.page-view -->
    </div><!-- /.container -->
@endsection
@section('page-script')

@endsection