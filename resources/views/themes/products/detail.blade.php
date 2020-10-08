@extends('themes.productsdetail')

@section('page_title')
    Trang chủ
@endsection
@section('main-content')
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-5">
                    <div class="product-img clearfix">
                        <div class="easyzoom easyzoom--adjacent easyzoom--with-thumbnails">
                            <a href="{{asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)}}">
                                <img src="{{asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)}}" alt="" class="imgresponsive_detail"/>
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
                <div class="col-sm-7">
                    <h1 class="product-title">{{$detailproduct->name}}</h1>
                                       @if($detailproduct->cates->parent!=null)
                    <h2 class="product-subtitle">{{$detailproduct->cates->parent->name}}-{{$detailproduct->cates->name}}</h2>
                    @else
                        <h2 class="product-subtitle">{{$detailproduct->cates->name}}</h2>
                    @endif
                    @if($checktime==1 && $detailproduct->status==1)
                        <div class="price">Giá hiện tại: <span class="old" id="current" name="current">{{$detailproduct->price}} ETH</span></div>
                    <div class="product-button">
                        <input class="p-btn btn-qty" required type="number" step="1" min="{{$detailproduct->price}}" name="bindprice" id="bindprice" value="{{$detailproduct->price+1}}">
                        <button class="p-btn add-to-bind" id="placeBind" value="{{$detailproduct->id}}">ĐẶT GIÁ</button>
                    </div>
                    @endif
                    @if($checktime==2 && $detailproduct->status==2)
                        <div class="price">Giá cao nhất: <span class="old" id="current" name="current">{{$detailproduct->price}} ETH</span></div>
                    @endif
                    <div class="product-links">
                        @if($checktime==1 && $detailproduct->status==1 )
                            Giá khởi điểm: <span class="old"><b>{{number_format($detailproduct->price +1 ,2,',','.')}} ETH</b></span>
                            <button class="p-btn startus-openbind"><b>ĐANG MỞ ĐẤU GIÁ</b></button>
                        @elseif($checktime==2 && $detailproduct->status==1)
                            <button class="p-btn startus-endtime"><b>HẾT THỜI GIAN PHIÊN</b></button>
                        @elseif($checktime==2 && $detailproduct->status==2)
                           <button class="p-btn startus-endbind"><b>ĐÃ ĐÓNG PHIÊN</b></button>
                        @else
                            <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                        @endif

                        <a href="{!! $settings['linkfanpage']!!}" class="facebook" TARGET="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{!! $settings['instagram']!!}" TARGET="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div>
                        <b>Thời gian còn lại:</b> <span style="color: red" id="clock" class="timeclock"> </span>
                    </div>
                    <div class="pi-pdpmainbody">
                            <h2 class="mTitle" align="center">TÀI KHOẢN THẮNG ĐẤU GIÁ</h2>
                            <div class="nike-cq-table"><!-- top header -->
                                <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                    <tbody id = "winner_tbody">
                                    <tr class="nike-cq-table-header" style="height:65px;">
                                        <th >Họ và tên</th>
                                        <th style="width: 10%">Giá đặt</th>
                                        <th >Thời gian đặt</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!--/.tab-content-->
                    </div>
                </div><!--/.col-->
            </div><!-- /.row-->
            <div class="product-info-more">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mTitle" align="center">Danh sách giao dịch đấu giá mua sản phẩm</h2>
                        <div class="nike-cq-table"><!-- top header -->
                                <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                    <tbody id = "table_tbody">
                                    <tr class="nike-cq-table-header" style="height:65px;">
                                        <th  style="width: 10%">Hạng</th>
                                        <th style="width: 40%">Địa chỉ ví</th>
                                        <th style="width: 20%">Họ và tên</th>
                                        <th style="width: 10%">Giá đặt</th>
                                        <th >Thời gian</th>
                                    </tr>
                                    </tbody>
                                </table>
                        </div><!--/.tab-content-->
                    </div><!--/.col-12-->
                </div><!-- /.row-->
            </div><!--/.product-info-more-->
        </div><!-- /.page-view -->
    </div><!-- /.container -->
@endsection
@section('page-script')
    <script>
        $(document).on('ready', function(){
            $('#clock').countdown('{{$detailproduct->endtime}}', function(event){
                $(this).html(event.strftime('%D ngày %H:%M:%S'));
            });
            var contract = '{{$settings['contractaddress']}}';
            var nowtime = '{{strtotime($nowtime)}}';
            var proid = '{{$detailproduct->bind}}';
            var proid = parseInt(proid);
            if(isNaN(proid)==false)
            {
                // Gán các thông tin đấu giá
                getBindCount(contract,proid,function (totalBind){
                    if(totalBind==0){
                        $('.price [name="current"]').html('0 giao dịch đặt giá');
                        $('#table_tbody').append("<tr>" +
                            "<td class='nsg-bg--white' style='height:40px;' colspan='5'>Chưa có giao dịch đấu giá mua sản phẩm</td>" +
                            "</tr>");
                    }else{
                        queryProduct(contract,proid,function (data){
                            $('.price [name="current"]').html(data[5] + ',00 ETH' + '('+ totalBind + 'giao dịch đặt giá)');
                            $('[name="bindprice"]').val(parseInt(data[5]) + 1);
                            $('[name="bindprice"]').attr('min',parseInt(data[5]) + 1);
                        });
                        // Hiển thị danh sách người dùng
                        var stt =1;
                        for (var i = totalBind-1; i >=0; i--){
                            getBidProduct(contract,proid,i,function (data){
                                var date = new Date(data[5]*1000);
                                $('#table_tbody').append("<tr>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>"+ stt + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[2] + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[4] + " ETH </td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'> " + date + "</td>"+
                                    "</tr>");
                                stt++;
                            });
                        }
                    }
                });

                getStatus(contract,proid,function(status){
                   if(status==3 || status==4){
                       getWinner(contract,proid,function (awinner) {
                           var date = new Date(awinner[5]*1000);
                           $('#winner_tbody').append("<tr>" +
                               "<td class='nsg-bg--white' style='height:40px; color:'>" +awinner[2] + "</td>" +
                               "<td class='nsg-bg--white' style='height:40px; color: red'>" +awinner[4] + " ETH </td>" +
                               "<td class='nsg-bg--white' style='height:40px; color: red'> " + date + "</td>"+
                               "</tr>");
                       })
                   }else{
                       $('#winner_tbody').append("<tr>" +
                           "<td class='nsg-bg--white' style='height:40px;' colspan='3'>Giao dịch chưa xác nhận tài khoản thắng đấu giá</td>" +
                           "</tr>");
                   }

                });
                // Check điều kiện người dùng đã đăng nhập và đặt giá
                        @if(!Auth::guest())
                var bidder ='{{Auth::user()->profile->wallet}}';
                var buy_name ='{{Auth::user()->full_name}}';
                var buy_email ='{{Auth::user()->email}}';
                getUserBind(contract,function (Products){
                    var numbers = Products.length;
                    for(var i=0; i<=numbers-1; i++){
                        if(Products[i]==proid) {
                            $('#placeBind').html('TIẾP TỤC ĐẶT');
                        }
                    }
                    $('#placeBind').click(function() {
                        var amount = parseInt($('[name="bindprice"]').val());
                        placeBid(contract,proid,bidder,buy_name,buy_email,amount);
                    })
                });
                @endif
            }

        });

    </script>
@endsection