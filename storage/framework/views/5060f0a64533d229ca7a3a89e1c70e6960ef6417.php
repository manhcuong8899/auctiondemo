<?php $__env->startSection('page_title'); ?>
    Lịch sử tham dự đấu giá
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
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
      <?php if(!Auth::guest()): ?>
        var contract = '<?php echo e($settings['contractaddress']); ?>';
        var bidder ='<?php echo e(Auth::user()->profile->wallet); ?>';
        var wallet = bidder.toLowerCase();
        getUserBind(contract,bidder,function (Products){
            var numbers = Products.length;
            var allstt =1;
            var activestt =1;
            var winnerstt=1;
            var refundstt=1
            for(var i=0; i<=numbers-1; i++){
                var proid = Products[i];
                queryProduct(contract,proid,function (data){
                    alert(data)
                    getBindCount(contract,proid,function (Total){
                        for (var j = Total-1; j >=0; j--){
                            getBidProduct(contract,proid,j,function (bid){
                                var datebid = new Date(bid[4]*1000);
                                var binder = bid[0];
                                var amount = bid[3];
                                var n = binder.localeCompare(wallet); // so sánh chuỗi
                                if(n==0){
                                    $('#all_tbody').append("<tr>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>"+ allstt + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'>" +amount + ' ETH'+"</td>" +
                                        "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                        "</tr>");
                                    allstt++;
                                }

                            });
                        }

                    })
                });
            }
        });
        <?php endif; ?>


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.members', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>