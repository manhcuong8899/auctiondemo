<?php $__env->startSection('page_title'); ?>
    Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-6">
                    <div class="product-img clearfix">
                        <div class="easyzoom easyzoom--adjacent easyzoom--with-thumbnails">
                            <a href="<?php echo e(asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)); ?>">
                                <img src="<?php echo e(asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)); ?>" alt="" class="imgresponsive_detail"/>
                            </a>
                        </div>
                    </div>
                    <ul id="thumblist" class="thumbnails clearfix" >
                        <?php foreach($files_images as $key=>$url): ?>
                        <li <?php if($key==0): ?>class="active" <?php endif; ?>>
                            <a href='<?php echo e(asset('public/images/'.$url)); ?>' data-standard="<?php echo e(asset('public/images/'.$url)); ?>" >
                                <img src='<?php echo e(asset('public/images/'.$url)); ?>'>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
                $checktime = \App\Http\Controllers\Controller::checkendtime($detailproduct->starttime,$detailproduct->endtime);
                ?>
                <div class="col-sm-6">
                    <h1 class="product-title"><?php echo e($detailproduct->name); ?></h1>
                                       <?php if($detailproduct->cates->parent!=null): ?>
                    <h2 class="product-subtitle"><?php echo e($detailproduct->cates->parent->name); ?>-<?php echo e($detailproduct->cates->name); ?></h2>
                    <?php else: ?>
                        <h2 class="product-subtitle"><?php echo e($detailproduct->cates->name); ?></h2>
                    <?php endif; ?>
                    <?php if($checktime==1 && $detailproduct->status==1): ?>
                        <div class="price">Giá hiện tại: <span class="old" id="current" name="current"><?php echo e($detailproduct->price); ?> ETH</span></div>
                    <div class="product-button">
                        <input class="p-btn btn-qty" required type="number" step="1" min="<?php echo e($detailproduct->price); ?>" name="bindprice" id="bindprice" value="<?php echo e($detailproduct->price+1); ?>">
                        <button class="p-btn add-to-bind" id="placeBind" value="<?php echo e($detailproduct->id); ?>">ĐẶT GIÁ</button>
                    </div>
                    <?php endif; ?>
                    <div class="product-links">
                        <?php if($checktime==1 && $detailproduct->status==1 ): ?>
                            Giá khởi điểm: <span class="old"><b><?php echo e(number_format($detailproduct->price +1 ,2,',','.')); ?> ETH</b></span>
                            <button class="p-btn startus-openbind"><b>ĐANG MỞ ĐẤU GIÁ</b></button>
                        <?php elseif($checktime==2 && $detailproduct->status==1): ?>
                            <button class="p-btn startus-endtime"><b>HẾT THỜI GIAN PHIÊN</b></button>
                        <?php elseif($checktime==2 && $detailproduct->status==2): ?>
                           <button class="p-btn startus-endbind"><b>KẾT THÚC PHIÊN</b></button>
                        <?php else: ?>
                            <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                        <?php endif; ?>

                        <a href="<?php echo $settings['linkfanpage']; ?>" class="facebook" TARGET="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $settings['instagram']; ?>" TARGET="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="pi-pdpmainbody">
                        <div id="clock" class="timeclock"></div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script>
        $(document).on('ready', function(){
            $('#clock').countdown('<?php echo e($detailproduct->endtime); ?>', function(event) {
                $(this).html(event.strftime('%D ngày %H:%M:%S'));
            });

            var proid = '<?php echo e($detailproduct->bind); ?>';
            var contract = '<?php echo e($settings['contractaddress']); ?>';
            // Gán các thông tin đấu giá
            getBindCount(contract,proid,function (totalBind) {
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
                        getBidProduct(contract,proid,i,function (data) {
                            var date = new Date(data[4]*1000);
                                    $('#table_tbody').append("<tr>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>"+ stt + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[0] + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[1] + "</td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'>" +data[3] + " ETH </td>" +
                                    "<td class='nsg-bg--white' style='height:40px;'> " + date + "</td>"+
                                    "</tr>");
                            stt++;
                        });
                    }
                }
            });

        // Check điều kiện người dùng đã đăng nhập
            <?php if(!Auth::guest()): ?>
            var bidder ='<?php echo e(Auth::user()->profile->wallet); ?>';
            var buy_name ='<?php echo e(Auth::user()->full_name); ?>';
            var buy_email ='<?php echo e(Auth::user()->email); ?>';

            getUserBind(contract,bidder,function (Products) {
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

            <?php endif; ?>
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.productsdetail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>