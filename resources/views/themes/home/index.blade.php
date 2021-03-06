@extends('themes.index')

@section('page_title')
Trang chủ
@endsection
@section('main-content')
        @foreach($group as $gp)
    <div class="cols-list-auto list-01">
            <div class="name-box">
                <h2><a href="{{url('nhom-san-pham/'.$gp->slug)}}"> <b> {{$gp->name}}</b></a> </h2>
            </div>
                   <div class="cols-list-content">
                <div class="owl-carousel">
                    @foreach(viewProduct($gp->id) as $list)
                        <div class="item">
                            <?php
                            $checktime = \App\Http\Controllers\Controller::checkendtime($list->starttime,$list->endtime);
                            ?>
                            <div class="cover"><a href="{{url($list->slug)}}"><img src="{{asset('public/images/products/'.$list->model.'/'.$list->images)}}"alt="{{$list->name}}" class="imgresponsive"></a></div>
                            <div class="info-color" align="center">
                                   @if($checktime==1 && $list->status==1 )
                                    <a href="{{url($list->slug)}}"><button class="p-btn startus-openbind" value="{{$list->id}}">ĐANG MỞ ĐẤU GIÁ</button></a>
                                    @elseif($checktime==2 && $list->status==1)
                                    <a href="{{url($list->slug)}}"><button class="p-btn startus-endtime"><b>HẾT THỜI GIAN PHIÊN</b></button></a>
                                    @elseif($checktime==2 && $list->status==2)
                                    <a href="{{url($list->slug)}}"><button class="p-btn startus-endbind"><b>KẾT THÚC PHIÊN</b></button></a>
                                    @else
                                        <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                                    @endif
                            </div>
                                <h3><a href="{{url($list->slug)}}"><b> {{$list->name}}</b></a></h3>
                            <h3><a href="{{url($list->slug)}}">Mã sản phẩm: {{$list->code}}</a></h3>
                            <div class="price"><span>Giá sàn: {{number_format($list->price +1,'2',',','.')}} ETH</span></div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div><!-- /.block-products -->
    @endforeach
@endsection
@section('page-script')
@endsection