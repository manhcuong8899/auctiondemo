<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->


    <section class="content">
        <div class="row">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin chi tiết đơn hàng:</h3>
            </div>
            <div class="col-md-6">
            <div class="box">
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người mua hàng</label>
                            <input type="email" class="form-control" disabled value="<?php echo e($order->full_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Điện thoại</label>
                            <input type="email" class="form-control" disabled value="<?php echo e($order->phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="email" class="form-control" disabled value="<?php echo e($order->address); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình thức thanh toán</label>
                            <input type="email" class="form-control" disabled value="<?php echo e($order->typeCard); ?>">
                        </div>


                    </div>
                    <!-- /.box-body -->
                </form>
            </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Người nhận hàng</label>
                                <input type="email" class="form-control" disabled value="<?php echo e($order->full_name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại thanh toán</label>
                                <input type="email" class="form-control" disabled value="<?php echo e($order->phonepay); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại thanh toán khác</label>
                                <input type="email" class="form-control" disabled value="<?php echo e($order->phone2pay); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ thanh toán</label>
                                <input type="email" class="form-control" disabled value="<?php echo e($order->address); ?>">
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông tin đơn hàng: <b><?php echo e($order->code); ?></b> - Trạng thái:<font color="blue"><?php echo e($order->orderstatus->name); ?></font> - Thanh toán:<font color="#ff0000"><?php echo e(number_format($order->total+$order->freight-$order->discount,0,',','.')); ?>đ</font></h3>
                            </div>
                            <div class="box-body">
                                <table  class="table table-responsive table-bordered table-hover table-striped">
                                    <thead>
                                    <tr align="center">
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach($details as $key=>$value): ?>
                                        <tr>
                                            <td><b> <?php echo e($key+1); ?></b></td>
                                            <td>  <?php echo e($value->product->name); ?></td>
                                            <td>  <?php echo e($value->quantity); ?></td>
                                            <td>  <?php echo e($value->size); ?></td>
                                            <td>  <?php echo e($value->color); ?></td>
                                            <td>  <?php echo e(number_format($value->price,'0',',','.')); ?>đ</td>
                                            <td>  <?php echo e(number_format($value->price*$value->quantity,'0',',','.')); ?>đ</td>
                                        </tr>
                                    <?php endforeach; ?>

                                   <tr>
                                       <td colspan="6" align="right">Tổng chi phí</td>
                                       <td><?php echo e(number_format($order->total,0,',','.')); ?>đ</td>
                                   </tr>
                                   <tr>
                                       <td colspan="6" align="right">Giảm trừ</td>
                                       <td><?php echo e(number_format($order->discount,0,',','.')); ?>đ</td>
                                   </tr>
                                   <tr>
                                       <td colspan="6" align="right">Vận chuyển</td>
                                       <td><?php echo e(number_format($order->freight,0,',','.')); ?>đ</td>
                                   </tr>
                                   <tr>
                                       <td colspan="6" align="right"><b>Thanh toán</b></td>
                                       <td><font color="#ff0000"><?php echo e(number_format($order->total+$order->freight-$order->discount,0,',','.')); ?>đ</font></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.box -->
        </div><!-- /.box -->
    </section><!-- /.content -->
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscripts'); ?>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.ordersdetail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>