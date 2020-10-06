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
      <?php if(!Auth::guest()): ?>
        var contract = '<?php echo e($settings['contractaddress']); ?>';
        var wallet ='<?php echo e(Auth::user()->profile->wallet); ?>';
        var all =1;
        var pending =1;
        var win =1;
        var refund=1;
        getHistoryCount(contract,wallet,function(total) {
            for(var n=total-1; n>=0;n--){
                gethistorys(contract,wallet,n,function (data) {
                    var datebid = new Date(data[3]*1000);
                    queryProduct(contract,data[0],function (data_product){
                        var p_name =data_product[1];
                        getBidProduct(contract,data[0],data[1],function (data_bind){
                            var bid_status = data_bind[5];

                            $('#all_tbody').append("<tr>" +
                                "<td class='nsg-bg--white' style='height:40px;'>"+ all + "</td>" +
                                "<td class='nsg-bg--white' style='height:40px;'>" +p_name + "</td>" +
                                "<td class='nsg-bg--white' style='height:40px;'>" +data[2] + ' ETH'+"</td>" +
                                "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                "</tr>");
                            all++;

                            if(bid_status==0){
                                $('#active_tbody').append("<tr>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>"+ pending + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +p_name + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[2] + ' ETH'+"</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                    "</tr>");
                                pending++;
                            }else if(bid_status==1){
                                $('#winner_tbody').append("<tr>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>"+ win + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +p_name + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[2] + ' ETH'+"</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                    "</tr>");
                                win++;
                            }else{
                                $('#return_tbody').append("<tr>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>"+ refund + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +p_name + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[2] + ' ETH'+"</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'> " + datebid + "</td>"+
                                    "</tr>");
                                refund++;
                            }


                        })
                    })
                })

            }
        })

        <?php endif; ?>


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.members', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>