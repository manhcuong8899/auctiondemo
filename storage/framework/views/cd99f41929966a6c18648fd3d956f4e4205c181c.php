<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sản phẩm</h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách sản phẩm</h3>
            </div>
            <div class="box-body">
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
                <a class="btn btn-success btn-md" href="<?php echo e(url('admin/create/products')); ?>">
                    <i class="fa fa-plus"></i> <?php echo e(trans('VNPCMS.forms.buttons.addnew')); ?>

                </a>
                <?php endif; ?>
                <br style="clear:both;">
                <br style="clear:both;">
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
                <table  class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.id')); ?></th>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.name')); ?></th>
                        <th>Giá bán (ETH)</th>
                        <th>Số lượng</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Trạng thái</th>
                        <?php if(isset($status) && $status==0): ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.action')); ?></th>
                        <?php endif; ?>
                            <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach( $products as $product ): ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->name); ?></td>
                                <td><input class="form-control" value="<?php echo e(number_format($product->price,2,'.',',')); ?>" id="price<?php echo e($product->id); ?>" style="width: 60px"></td>

                                <td><input class="form-control" value="<?php echo e($product->quantity); ?>" id="quantity<?php echo e($product->id); ?>" style="width: 60px"></td>
                                <td><input type="text" class="form-control" value="<?php echo e($product->starttime); ?>" id="starttime<?php echo e($product->id); ?>" style="width: 150px"></td>
                                <td>

                                    <input type="text" class="form-control" value="<?php echo e($product->endtime); ?>" id="endtime<?php echo e($product->id); ?>" style="width: 150px">
                                </td>
                            <td>
                                <?php
                                $checktime = \App\Http\Controllers\Controller::checkendtime($product->starttime,$product->endtime);
                                ?>
                                    <?php if($checktime==1 && $product->status==1 ): ?>
                                        <a id="<?php echo e($product->id); ?>"  onclick="PushProduct(this.id);"> <i class="fa fa-check text-blue"></i></a> Đang mở phiên
                                    <?php elseif($checktime==2 && $product->status==1): ?>
                                        <a id="<?php echo e($product->id); ?>"  onclick="PushProduct(this.id);"> <i class="fa fa-times-circle text-purple"></i></a> Hết thời gian
                                        <?php elseif($checktime==2 && $product->status==2): ?>
                                        <a id="<?php echo e($product->id); ?>"  onclick="PushProduct(this.id);"> <i class="fa fa-check text-blue"></i></a> Đã đóng phiên
                                        <?php else: ?>
                                        <a id="<?php echo e($product->id); ?>"  onclick="PushProduct(this.id);"> <i class="fa fa fa-times text-red"></i></a> Chưa mở phiên
                                        <?php endif; ?>
                            </td>
                            <td>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
                                    <?php if($checktime==1 && $product->status==1 ): ?>
                                        <a id="<?php echo e($product->id); ?>" class="btn btn-xs btn-default btn-flat"  onclick="PushProduct(this.id);"> <i class="fa fa fa-remove text-red"></i> Hủy đấu giá</a>
                                    <?php elseif($checktime==2 && $product->status==1): ?>
                                        <a id="<?php echo e($product->bind); ?>" class="btn btn-xs btn-default btn-flat"  onclick="PushEndAuction(this.id);"> <i class="fa fa fa-calendar-times-o text-blue"></i> Đóng phiên</a>
                                    <?php elseif($checktime==2 && $product->status==2): ?>
                                        <a id="<?php echo e($product->bind); ?>" class="btn btn-xs btn-default btn-flat"  onclick="Getcoin(this.id);"> <i class="fa fa fa-calendar-times-o text-blue"></i> Nhận Coin</a>
                                    <?php else: ?>
                                        <a id="<?php echo e($product->id); ?>" class="btn btn-xs btn-default btn-flat"  onclick="PushProduct(this.id);"> <i class="fa fa fa-plus text-blue"></i> Mở Phiên</a>
                                        <a data-productname="<?php echo e($product->name); ?>" data-productid="<?php echo e($product->id); ?>" data-updaterurl="<?php echo e(url('admin/products/aupdate/'.$product->id)); ?>" title="Cập nhật sản phẩm" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#aUpdateDialog">
                                            <i class="fa fa-edit text-blue"></i>Cập nhật
                                        </a>
                                        <a class="btn btn-xs btn-default btn-flat" href="<?php echo e(url('admin/products/edit/'.$product->id)); ?>">
                                            <i class="fa fa-edit text-blue"></i><?php echo e(trans('VNPCMS.forms.titles.edit')); ?>

                                        </a>
                                        <button type="button" data-productid="<?php echo e($product->id); ?>" data-productname="<?php echo e($product->name); ?>"  data-productdeleteurl="<?php echo e(url('admin/products/delete/'.$product->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmProductsDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title="Xóa sản phẩm"></i></button>
                                    <?php endif; ?>
                                <?php endif; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.id')); ?></th>

                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.name')); ?></th>

                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.status')); ?></th>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.createdat')); ?></th>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.action')); ?></th>
                        <?php endif; ?>
                    </tr>
                    </tfoot>
                </table>
                <?php endif; ?>
                <div class="pagination-wrap">
                    <ul>
                        <?php echo $products->render(); ?>

                    </ul>
                </div><!-- /.pagination-wrap -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tìm kiếm sản phẩm đấu giá</h3>
            </div>
            <form role="form" action="<?php echo e(url('admin/products/seach')); ?>" method="GET" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Danh mục sản phẩm</label>
                                <select class="form-control" name="categories">
                                    <?php function_add($cates); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Thông tin sản phẩm đấu giá</label>
                                <input type="text" name="nameseach" class="form-control" placeholder="Nhập Tên, Mã, nhãn hiệu sản phẩm">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" align="center">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>
        </div>

        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="confirmProductsDelete">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Xác nhận xóa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo e(trans('VNPCMS.forms.help.areyousure')); ?> <b><span id="productname"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo e(trans('VNPCMS.forms.buttons.close')); ?></button>
                        <?php echo Form::open(['method' => 'DELETE', 'id'=>'delForm']); ?>

                        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> <?php echo e(trans('VNPCMS.forms.buttons.delete')); ?></button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <?php endif; ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="aUpdateDialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Xác nhận cập nhật sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn cập nhận sản phẩm <b><span id="productname"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo e(trans('VNPCMS.forms.buttons.close')); ?></button>
                        <?php echo Form::open(['method' => 'UPDATE', 'id'=>'aupdate']); ?>

                        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-edit"></i> Cập nhật</button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
    <script>

        function PushEndAuction(id){
            var contract = '<?php echo e(CRMSettings('contractaddress')); ?>';
            endAuction(contract,id,function(kq) {
            });
        }

        function Getcoin(id){
            var contract = '<?php echo e(CRMSettings('contractaddress')); ?>';
               GetCoinFromWinner(contract,id);
        }

        function PushProduct(id){
            var contractaddress ='<?php echo e(CRMSettings('contractaddress')); ?>';
            var urlpro = '<?php echo e(url('admin/updateprobind')); ?>';
            var seller = '<?php echo e(CRMSettings('wallet')); ?>';
            $.ajax({
                url: '<?php echo e(url('admin/bindproduct')); ?>',
                dataType: "json",
                type: "post",
                data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', proId: id}
            }).done(function(data){
               createProduct(contractaddress,data.id,seller,data.name,data.starttime,data.endtime,data.price,function (getblock){
                  if(getblock!=null){
                      getProductCount(contractaddress,function(Total){
                              $.ajax({
                                  url: urlpro,
                                  dataType: "json",
                                  type: "post",
                                  data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', proid: id, bindid:Total-1}
                              }).done(function(data){
                                  alert('Hoàn thành quá trình tạo phiên!');
                                  location.reload();
                              }).fail(function(data){
                                  alert('Lỗi không thể tạo phiên ');
                              });
                      });
                  }else{
                      alert('Lỗi không đồng bộ thời gian xử lý giao dịch');
                  }
               });
            }).fail(function(data){
                alert('Không thể đẩy sản phẩm lên sàn đấu giá');
            });
        }
    </script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>