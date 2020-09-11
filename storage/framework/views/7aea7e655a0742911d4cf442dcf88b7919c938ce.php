<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                    <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Danh sách đơn hàng</h3>
                            </div>
                            <div class="box-body">

                                <table id="alluserstable" class="table table-responsive table-bordered table-hover table-striped">
                                    <thead>
                                    <tr align="center">
                                        <th>STT</th>
                                        <th>Mã giao dịch</th>
                                        <th>Khách hàng</th>
                                        <th>Giá trị</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach($orders as $key=>$value): ?>
                                        <tr>
                                            <td><b> <?php echo e($key+1); ?></b></td>
                                            <td>  <?php echo e($value->code); ?></td>
                                            <td>  <?php echo e($value->full_name); ?></td>
                                            <td>  <?php echo e(number_format($value->total+$value->freight-$value->discount,'0',',','.')); ?>đ</td>
                                            <td>  <?php echo e($value->orderstatus->name); ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-default btn-flat" href="<?php echo e(url('admin/view/order/'.$value->id)); ?>">
                                                    <i class="fa fa-eye text-blue"></i> Xem chi tiết
                                                </a>
                                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('orderonline_management')): ?>
                                                <a data-code="<?php echo e($value->code); ?>" data-status="<?php echo e($value->status); ?>"  data-orderurl="<?php echo e(url('admin/movestatus/order/'.$value->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#StatusDialog">
                                                    <i class="fa fa-edit text-blue"></i> Chuyển Trạng thái
                                                </a>
                                                <?php if($value->orderstatus->code == 'cancelled'): ?>
                                                    <a data-title="Xác nhận xóa đơn hàng!" data-body="Bạn có chắc chắn xóa đơn hàng?" href="<?php echo e(url('admin/delete/order/'.$value->id)); ?>" class="btn btn-xs btn-default btn-flat confirm-link"><i class="fa fa-trash text-red" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.delete')); ?>"></i></a>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.box -->
    </section><!-- /.content -->
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscripts'); ?>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>