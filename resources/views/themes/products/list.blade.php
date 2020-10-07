@extends('themes.products')
@section('page_title')
@endsection
@section('main-content')
    <div class="list-col-right">
        <div class="list-products">
            <div class="row">
        @foreach($listproducts as $key=>$list)
                    <?php
                    $checktime = \App\Http\Controllers\Controller::checkendtime($list->starttime,$list->endtime);
                    ?>
                    <div class="col-5">
                        <div class="grid-item hot-product">
                            <div class="item-box">
                                <div class="cover"><a href="{{url($list->slug)}}"><img src="{{asset('public/images/products/'.$list->model.'/'.$list->images)}}" alt="{{$list->name}}" class="imgresponsive"></a></div>
                                <div class="info-product">
                                    <div class="info-color" align="center">
                                        @if($checktime==1 && $list->status==1 )
                                            <a href="{{url($list->slug)}}"><button class="p-btn startus-openbind" value="{{$list->id}}">ĐANG MỞ ĐẤU GIÁ</button></a>
                                        @elseif($checktime==2 && $list->status==1)
                                            <a href="{{url($list->slug)}}"> <button class="p-btn startus-endtime"><b>HẾT THỜI GIAN PHIÊN</b></button></a>
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
                            </div>
                        </div>
                    </div>
@endforeach
            </div>
        </div>
        @if($page=='list')
        <div align="center">
            {!! $listproducts->render() !!}
        </div>
            @endif

        @if($page=='order')
            <div align="center">
                {!! $listproducts->appends([$page => $curl])->render() !!}
            </div>
        @endif

        @if($page=='seach')
            <div align="center">
                @if($pageSize!=null && $pageColor==null)
                {!! $listproducts->appends(['seach' => 'true','size'=>$pageSize])->render() !!}
                @endif

                    @if($pageSize==null && $pageColor!=null)
                        {!! $listproducts->appends(['seach' => 'true','color'=>$pageColor])->render() !!}
                    @endif

                    @if($pageSize!=null && $pageColor!=null)
                        {!! $listproducts->appends(['seach' => 'true','size'=>$pageSize,'color'=>$pageColor])->render() !!}
                    @endif
            </div>
        @endif


    </div><!-- /.list-col-right -->
@endsection
@section('page-script')
@endsection