@extends('themes.members')

@section('page_title')
    Lịch sử tham dự đấu giá
@endsection
@section('main-content')
    <div class="col-sm-9">
        <div class="acc-right">
            <h3 class="acc_title">Lịch sử tham dự đấu giá</h3>
            <ul class="nav nav-tabs acc-order-nav" role="tablist">
                <li class="active"><a href="#all" data-toggle="tab">Tất cả giao giao dịch</a></li>
                <li ><a href="#active" data-toggle="tab">Giao dịch đang thực hiện</a></li>
                <li><a href="#winner" data-toggle="tab">Giao dịch thắng cuộc</a></li>
                <li><a href="#return" data-toggle="tab">Giao dịch hoàn lại</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <div class="col-sm-12">
                        <div class="nike-cq-table"><!-- top header -->
                            <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                <tbody id = "all_tbody">
                                <tr class="nike-cq-table-header" style="height:65px;">
                                    <th  style="width: 10%">STT</th>
                                    <th style="width: 40%">SẢN PHẨM</th>
                                    <th style="width: 10%">GIÁ ĐẶT</th>
                                    <th >THỜI GIAN ĐẶT</th>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--/.tab-content-->
                    </div><!--/.col-12-->
                </div><!--/.tab 1-->

                <div class="tab-pane" id="active">
                        <div class="col-sm-12">
                            <div class="nike-cq-table"><!-- top header -->
                                <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                    <tbody id = "active_tbody">
                                    <tr class="nike-cq-table-header" style="height:65px;">
                                        <th  style="width: 10%">STT</th>
                                        <th style="width: 40%">SẢN PHẨM</th>
                                        <th style="width: 10%">GIÁ ĐẶT</th>
                                        <th >THỜI GIAN ĐẶT</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!--/.tab-content-->
                        </div><!--/.col-12-->
                </div><!--/.tab 1-->
                <div class="tab-pane" id="winner">
                    <div class="col-sm-12">
                        <div class="nike-cq-table"><!-- top header -->
                            <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                <tbody id = "winner_tbody">
                                <tr class="nike-cq-table-header" style="height:65px;">
                                    <th  style="width: 10%">STT</th>
                                    <th style="width: 40%">SẢN PHẨM</th>
                                    <th style="width: 10%">GIÁ ĐẶT</th>
                                    <th >THỜI GIAN ĐẶT</th>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--/.tab-content-->
                    </div><!--/.col-12-->
                </div><!--/.tab 2-->
                <div class="tab-pane" id="return">
                    <div class="col-sm-12">
                        <div class="nike-cq-table"><!-- top header -->
                            <table class="nsg-text--medium-grey top" cellpadding="5" cellspacing="5">
                                <tbody id = "return_tbody">
                                <tr class="nike-cq-table-header" style="height:65px;">
                                    <th  style="width: 10%">STT</th>
                                    <th style="width: 40%">SẢN PHẨM</th>
                                    <th style="width: 10%">GIÁ ĐẶT</th>
                                    <th >THỜI GIAN ĐẶT</th>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--/.tab-content-->
                        <div align="center">
                          <button class="p-btn startus-endbind" id="withraweth"><b>RÚT <span name="withraw"></span> ETH </b></button>
                        </div>
                    </div><!--/.col-12-->
                </div><!--/.tab 3-->
            </div>
        </div>
    </div><!-- /.col-sm  -->
@endsection
@section('page-script')
    <script type="text/javascript">
        $(document).on('ready', function(){
            $('.btn-details').click(function(){
                if($(this).hasClass('opened')){

                    $(this).removeClass('opened');
                }else{
                    $(this).addClass('opened');
                }
                var summaryInfo = $(this).closest('.item').find('.summaryInfo').slideToggle();
            });
        });
      @if(!Auth::guest())
        var contract = '{{$settings['contractaddress']}}';
        var bidder ='{{Auth::user()->profile->wallet}}';
        var wallet = bidder.toLowerCase();
        getUserBind(contract,bidder,function (Products){
            var numbers = Products.length;
            var allstt =1;
            var activestt =1;
            var winnerstt=1;
            var refundstt=1
            for(var i=0; i<=numbers-1;){
                var proid = Products[i];
                queryProduct(contract,proid,function (data){
                    getBindCount(contract,proid,function (Total){
                        for (var j = Total-1; j >=0; j--){
                            getBidProduct(contract,proid,j,function(bidpro){
                                var datebid = new Date(bidpro[4]*1000);
                                var binder = bidpro[0];
                                var n = binder.localeCompare(wallet); // so sánh chuỗi
                                if(n==0){
                                    $('#all_tbody').append("<tr>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>"+ allstt + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +data[0] + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +bidpro[3] + ' ETH'+"</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                        "</tr>");
                                    allstt++;
                                }
                                if(data[6]==1 && n==0 && bid[5]==0){
                                    $('#active_tbody').append("<tr>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>"+ activestt + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +amount + ' ETH'+"</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                        "</tr>");
                                    activestt++;
                                }
                                if(data[6]==3 && n==0 && bid[5]==1){
                                    $('#winner_tbody').append("<tr>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>"+ winnerstt + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +amount + ' ETH'+"</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                        "</tr>");
                                    winnerstt++;
                                }
                                if(n==0 && bid[5]==2){
                                    $('#return_tbody').append("<tr>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>"+ refundstt + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +amount + ' ETH'+"</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                        "</tr>");
                                    refundstt++;
                                }

                            });
                        }

                    })
                });
                i++
            }
        });
        @endif


    </script>
@endsection