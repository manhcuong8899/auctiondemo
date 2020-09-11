<?php $__env->startSection('page_title'); ?>
    Lịch sử tham dự đấu giá
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="col-sm-9">
        <div class="acc-right">
            <h3 class="acc_title">Lịch sử tham dự đấu giá</h3>
            <ul class="nav nav-tabs acc-order-nav" role="tablist">
                <li class="active"><a href="#tab-completed" data-toggle="tab">Đang thực hiện đấu giá</a></li>
                <li><a href="#winner" data-toggle="tab">Giao dịch thắng cuộc</a></li>
                <li><a href="#return" data-toggle="tab">Giao dịch hoàn lại</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-completed">
                    <div class="acc-list-orders">
                        <?php foreach($complete as $key=>$list): ?>
                        <div class="item">
                            <div class="acc-head-info">
                                <span>Thời gian: <?php echo e(date($list->created_at)); ?></span>
                                <span>Số lượng: <?php echo e($list->detail->count()); ?></span>
                                <span>Tổng chi phí: <?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                <div class="text-right btn-details">
                                    <a href="#">Chi tiêt</a>
                                </div>
                            </div>
                            <div class="summaryInfo">
                                <table>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th width="100">Địa chỉ</th>
                                        <th>Thanh toán</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo e($list->code); ?></td>
                                        <td><?php echo e($list->address); ?></td>
                                        <td><?php echo e($list->typeCard); ?></td>
                                        <td>
                                            <p>Tổng giá sản phẩm: <?php echo e(number_format($list->total,0,',','.')); ?>đ</p>
                                            <p>Giảm trù: <?php echo e(number_format($list->discount,0,',','.')); ?>đ</p>
                                            <p>Vận chuyển: <?php echo e(number_format($list->freight,0,',','.')); ?>đ</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="summary-table-total">
                                                <span class="font-bold">Tổng chi phí:</span>
                                                <span class="font-bold color-main"><?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="summaryList">
                                <div class="ship">Đã giao hàng</div>
                                <?php foreach($list->detail as $detail): ?>
                                <div class="cartItem">
                                    <div class="summaryItemImg"><img src="<?php echo e(asset('public/images/products/'.$detail->product->model.'/'.$detail->product->images)); ?>" class="imgresponsive"></div>
                                    <div class="summaryItemContent">
                                        <h4 class="summaryItemTitle"><?php echo e($detail->product->name); ?></h4>
                                        <div class="price"><?php echo e(number_format($detail->price*$detail->quantity,0,',','.')); ?>đ</div>
                                        <p class="ch4_cartItemOptions">
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:<?php echo e($detail->quantity); ?></span>
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Màu sắc</span>: <?php echo e($detail->color); ?></span>
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Size</span>: <?php echo e($detail->size); ?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <?php endforeach; ?>


                    </div><!-- /.acc-list-orders  -->

                </div><!--/.tab 1-->
                <div class="tab-pane" id="winner">
                    <div class="acc-list-orders">
                        <?php foreach($wait as $key=>$list): ?>
                            <div class="item">
                                <div class="acc-head-info">
                                    <span>Thời gian: <?php echo e(date($list->created_at)); ?></span>

                                    <span>Số lượng: <?php echo e($list->detail->count()); ?></span>
                                    <span>Tổng chi phí: <?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                    <div class="text-right btn-details">
                                        <a href="#">Chi tiêt</a>
                                    </div>
                                </div>
                                <div class="summaryInfo">
                                    <table>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th width="100">Địa chỉ</th>
                                            <th>Thanh toán</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo e($list->code); ?></td>
                                            <td><?php echo e($list->address); ?></td>
                                            <td><?php echo e($list->typeCard); ?></td>
                                            <td>
                                                <p>Tổng giá sản phẩm: <?php echo e(number_format($list->total,0,',','.')); ?>đ</p>
                                                <p>Giảm trù: <?php echo e(number_format($list->discount,0,',','.')); ?>đ</p>
                                                <p>Vận chuyển: <?php echo e(number_format($list->freight,0,',','.')); ?>đ</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="summary-table-total">
                                                    <span class="font-bold">Tổng chi phí:</span>
                                                    <span class="font-bold color-main"><?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="summaryList">
                                    <div class="ship">Chờ giao hàng</div>
                                    <?php foreach($list->detail as $detail): ?>
                                        <div class="cartItem">
                                          <?php if($detail->product!=null): ?>
                                            <div class="summaryItemImg"><img src="<?php echo e(asset('public/images/products/'.$detail->product->model.'/'.$detail->product->images)); ?>" class="imgresponsive"></div>
                                              <div class="summaryItemContent">
                                                <h4 class="summaryItemTitle"><?php echo e($detail->product->name); ?></h4>
                                                <div class="price"><?php echo e(number_format($detail->price*$detail->quantity,0,',','.')); ?>đ</div>
                                                <p class="ch4_cartItemOptions">
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:<?php echo e($detail->quantity); ?></span>
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Màu sắc</span>: <?php echo e($detail->color); ?></span>
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Size</span>: <?php echo e($detail->size); ?></span>
                                                </p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /.acc-list-orders  -->
                </div><!--/.tab 2-->
                <div class="tab-pane" id="return">
                    <div class="acc-list-orders">
                        <?php foreach($needconfirm as $key=>$list): ?>
                            <div class="item">
                                <div class="acc-head-info">
                                    <span>Thời gian: <?php echo e(date($list->created_at)); ?></span>

                                    <span>Số lượng: <?php echo e($list->detail->count()); ?></span>
                                    <span>Tổng chi phí: <?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                    <div class="text-right btn-details">
                                        <a href="#">Chi tiêt</a>
                                    </div>
                                </div>
                                <div class="summaryInfo">
                                    <table>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th width="100">Địa chỉ</th>
                                            <th>Thanh toán</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo e($list->code); ?></td>
                                            <td><?php echo e($list->address); ?></td>
                                            <td><?php echo e($list->typeCard); ?></td>
                                            <td>
                                                <p>Tổng giá sản phẩm: <?php echo e(number_format($list->total,0,',','.')); ?>đ</p>
                                                <p>Giảm trù: <?php echo e(number_format($list->discount,0,',','.')); ?>đ</p>
                                                <p>Vận chuyển: <?php echo e(number_format($list->freight,0,',','.')); ?>đ</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="summary-table-total">
                                                    <span class="font-bold">Tổng chi phí:</span>
                                                    <span class="font-bold color-main"><?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="summaryList">
                                    <div class="ship">Cần xác nhận lại thông tin</div>
                                    <?php foreach($list->detail as $detail): ?>
                                        <div class="cartItem">
                                            <div class="summaryItemImg"><img src="<?php echo e(asset('public/images/products/'.$detail->product->model.'/'.$detail->product->images)); ?>" class="imgresponsive"></div>
                                            <div class="summaryItemContent">
                                                <h4 class="summaryItemTitle"><?php echo e($detail->product->name); ?></h4>
                                                <div class="price"><?php echo e(number_format($detail->price*$detail->quantity,0,',','.')); ?>đ</div>
                                                <p class="ch4_cartItemOptions">
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:<?php echo e($detail->quantity); ?></span>
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Màu sắc</span>: <?php echo e($detail->color); ?></span>
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Size</span>: <?php echo e($detail->size); ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div><!-- /.acc-list-orders  -->
                </div><!--/.tab 3-->

                <div class="tab-pane" id="tab-cancel">
                    <div class="acc-list-orders">
                        <?php foreach($unpaid as $key=>$list): ?>
                            <div class="item">
                                <div class="acc-head-info">
                                    <span>Thời gian: <?php echo e(date($list->created_at)); ?></span>

                                    <span>Số lượng: <?php echo e($list->detail->count()); ?></span>
                                    <span>Tổng chi phí: <?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                    <div class="text-right btn-details">
                                        <a href="#">Chi tiêt</a>
                                    </div>
                                </div>
                                <div class="summaryInfo">
                                    <table>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th width="100">Địa chỉ</th>
                                            <th>Thanh toán</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo e($list->code); ?></td>
                                            <td><?php echo e($list->address); ?></td>
                                            <td><?php echo e($list->typeCard); ?></td>
                                            <td>
                                                <p>Tổng giá sản phẩm: <?php echo e(number_format($list->total,0,',','.')); ?>đ</p>
                                                <p>Giảm trù: <?php echo e(number_format($list->discount,0,',','.')); ?>đ</p>
                                                <p>Vận chuyển: <?php echo e(number_format($list->freight,0,',','.')); ?>đ</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="summary-table-total">
                                                    <span class="font-bold">Tổng chi phí:</span>
                                                    <span class="font-bold color-main"><?php echo e(number_format($list->total+$list->freight-$list->discount,0,',','.')); ?>đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="summaryList">
                                    <div class="ship">Chưa thanh toán</div>
                                    <?php foreach($list->detail as $detail): ?>
                                        <div class="cartItem">
                                            <?php if($detail->product!=null): ?>
                                            <div class="summaryItemImg"><img src="<?php echo e(asset('public/images/products/'.$detail->product->model.'/'.$detail->product->images)); ?>" class="imgresponsive"></div>
                                            <div class="summaryItemContent">
                                                <h4 class="summaryItemTitle"><?php echo e($detail->product->name); ?></h4>
                                                <div class="price">Đơn giá: <?php echo e(number_format($detail->price*$detail->quantity,0,',','.')); ?>đ (chưa bao gồm VAT)</div>
                                                <p class="ch4_cartItemOptions">
                                                    <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:<?php echo e($detail->quantity); ?></span>
                                                </p>
                                            </div>
                                                <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div><!-- /.acc-list-orders  -->
                </div><!--/.tab 4-->
            </div>
        </div>
    </div><!-- /.col-sm  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script type="text/javascript">
        $(document).on('ready', function() {
            $('.btn-details').click(function(){
                if($(this).hasClass('opened')){

                    $(this).removeClass('opened');
                }else{
                    $(this).addClass('opened');
                }

                var summaryInfo = $(this).closest('.item').find('.summaryInfo').slideToggle();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.members', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>