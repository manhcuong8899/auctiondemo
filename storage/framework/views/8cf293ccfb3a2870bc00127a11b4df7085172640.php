<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý nhóm sản phẩm</h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tạo nhóm sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(url('admin/groupproducts/create')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Tên nhóm sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="title">Block hiển thị</label>
                            <select class="form-control" name="block" id="block">
                                <option value="trangchu">Trang chủ</option>
                                <option value="sanpham">Sản phẩm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input name="status" value="1"  type="radio">
                                Hiển thị</label>
                            <label class="radio-inline">
                                <input name="status" value="0" checked="checked" type="radio">
                                Ẩn</label>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Loại dữ liệu</label>
                            <select class="form-control" name="data" id="data">
                                <option value="0">Lựa chọn loại dữ liệu</option>
                                <option value="categories">Theo danh mục sản phẩm</option>
                                <option value="products" >Theo sản phẩm</option>
                            </select>
                        </div>

                        <div class="form-group" style="display: none" id="renderurl">
                            <label for="title">Danh mục sản phẩm</label>
                            <select class="form-control select2"  name="group_cate[]" id="url" multiple="multiple" style="width:100%;">
                            </select>
                        </div>

                        <div class="form-group" style="display: none" id="renderarticle">
                            <label for="title">Sản phẩm</label>
                            <select class="form-control select2" name="group_product[]" id="article" multiple="multiple" style="width:100%;">
                            </select>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" align="center">
                            <button type="submit" class="btn btn-primary">Tạo nhóm sản phẩm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách nhóm sản phẩm</h3>
            </div>
            <div class="box-body">
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('grouproducts_management')): ?>
                <table id="alluserstable" class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên nhóm sản phẩm</th>
                        <th>Slug</th>
                        <th>Loại dữ liệu</th>
                        <th>Trạng thái</th>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('grouproducts_management')): ?>
                        <th>Thao tác</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($groups as $group ): ?>
                        <tr>
                            <td><?php echo e($group->id); ?></td>
                            <td>
                                <?php echo e($group->name); ?>

                            </td>
                            <td>
                             <?php echo e($group->slug); ?>

                            </td>
                            <td>
                              <?php echo e($group->data); ?>

                            </td>
                            <td>
                                <?php if($group->status==1): ?>
                                Hiển thị
                                <?php else: ?>
                                  Ẩn
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('grouproducts_management')): ?>
                                <a class="btn btn-xs btn-default btn-flat" href="<?php echo e(url('admin/groupproducts/edit/'.$group->id)); ?>">
                                    <i class="fa fa-edit text-blue"></i><?php echo e(trans('VNPCMS.forms.titles.edit')); ?>

                                </a>
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('grouproducts_management')): ?>
                                <button type="button" data-productid="<?php echo e($group->id); ?>" data-productname="<?php echo e($group->name); ?>" data-productdeleteurl="<?php echo e(url('admin/groupproducts/delete/'.$group->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmProductsDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.delete')); ?>"></i></button>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <?php endif; ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('grouproducts_management')): ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="confirmProductsDelete">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Xác nhận xóa nhóm sản phẩm</h4>
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
    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscripts'); ?>
    <script>
        $('#data').change(function(){
            var data = $('#data').val();
            var type = 'products';
            if(data=="categories")
            {
                $("#renderarticle").css("display","none");
                $.ajax({
                    url: '<?php echo e(url('admin/urlcategories')); ?>',
                    dataType: "html",
                    type: "post",
                    data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', data: data, type: type}
                }).done(function(jsonData) {
                    $("#renderurl").css("display","block");
                    $('#url').html(jsonData);
                }).fail(function(jsonData) {
                    alert('error send data');
                });
            }
            else{
                $("#renderurl").css("display","none");

                $.ajax({
                    url: '<?php echo e(url('admin/urlarticles')); ?>',
                    dataType: "json",
                    type: "post",
                    data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', data: data, type: type}
                }).done(function(jsonData) {
                    var opt = "";
                    $.each(jsonData, function (i, seach) {
                        var data3 = '<option value='+seach.id+'>';
                        data3 += seach.name +'-'+ seach.model;
                        data3 += '</option>';
                        opt += data3;
                    });
                    $("#renderarticle").css("display","block");
                    $('#article').html(opt);
                }).fail(function(jsonData) {
                    alert('error send data');
                });
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>