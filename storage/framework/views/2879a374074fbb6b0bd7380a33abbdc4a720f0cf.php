<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý <?php echo e($type->name); ?></h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa thông tin menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(url('admin/menus/'.$type->code.'/edit/'.$menu->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Loại dữ liệu</label>
                            <select class="form-control" name="type" id="type">
                                <option value="custom" selected>Tùy chỉnh</option>
                                <?php foreach($typedata as $value): ?>
                                    <option value="<?php echo e($value->code); ?>"><?php echo e($value->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Chứa submenu</label>
                        </div>
                        <div class="form-group">
                            <?php if($menu->submenu=='yes'): ?>
                                <label class="radio-inline">
                                    <input name="submenu" value="yes"  checked="checked" type="radio">
                                    Có </label>
                                <label class="radio-inline">
                                    <input name="submenu" value="no"  type="radio">
                                    Không </label>
                            <?php else: ?>
                                <input name="submenu" value="yes"  type="radio">
                                Có </label>
                                <label class="radio-inline">
                                    <input name="submenu" value="no"  checked="checked" type="radio">
                                    Không </label>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="title">Hình thức chuyển trang</label>
                        </div>
                        <div class="form-group">
                            <?php if($menu->bank==1): ?>
                                <label class="radio-inline">
                                    <input name="bank" value="1"  checked="checked" type="radio">
                                    Có </label>
                                <label class="radio-inline">
                                    <input name="bank" value="0"  type="radio">
                                    Không </label>
                            <?php else: ?>
                                <input name="bank" value="1"   type="radio">
                                Có </label>
                                <label class="radio-inline">
                                    <input name="bank" value="0" checked="checked" type="radio">
                                    Không </label>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Tên menu</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e($menu->name); ?>">
                        </div>
                        <?php if($menu->type=="custom"): ?>
                        <div class="form-group" id="renderlink">
                            <label for="title">Liên kết</label>
                            <input type="text" name="link" class="form-control" id="link" value="<?php echo e($menu->link); ?>">
                        </div>
                            <div class="form-group" style="display: none" id="renderdata">
                                <label for="title">Dữ liệu</label>
                                <select class="form-control" name="data" id="data">
                                    <option value="0">Lựa chọn dữ liệu</option>
                                    <option value="categories">Danh mục</option>
                                    <option value="articles">Nội dung</option>
                                </select>
                            </div>
                        <?php else: ?>
                            <div class="form-group" style="display: none" id="renderlink">
                                <label for="title">Liên kết</label>
                                <input type="text" name="link" class="form-control" id="link" value="<?php echo e($menu->link); ?>">
                            </div>
                            <div class="form-group" id="renderdata">
                                <label for="title">Dữ liệu</label>
                                <select class="form-control" name="data" id="data">
                                    <option value="<?php echo e($menu->data); ?>"><?php if($menu->data=='categories'): ?>Danh mục <?php elseif($menu->data=='products'): ?> Sản phẩm <?php else: ?> Nội dung <?php endif; ?></option>
                                    <option value="categories">Danh mục</option>
                                    <option value="articles">Nội dung</option>
                                    <option value="groups" id="groups" style="display: none">Nhóm sản phẩm</option>

                                </select>
                            </div>
                            <?php endif; ?>

                        <div class="form-group" style="display: none" id="renderurl">
                            <label for="title">Liên kết</label>
                            <select class="form-control" name="url" id="url" style="width: 100%;">
                            </select>
                        </div>


                        <?php if($menu->data=='categories' && $menu->url!=0): ?>
                        <div class="form-group">
                            <label for="title">Danh mục đang liên kết</label>
                            <select class="form-control" name="nowurl" id="nowurl">
                            <option value="<?php echo e($menu->url); ?>"><?php echo e($menu->nameurl->name); ?></option>
                            </select>
                        </div>
                        <?php endif; ?>


                        <div class="form-group" style="display: none" id="renderarticle">
                            <label for="title">Liên kết</label>
                            <select class="form-control select2" name="article" id="article" style="width: 100%;">
                            </select>
                        </div>

                        <?php if($menu->data=='articles' && $menu->url!=0): ?>
                            <div class="form-group">
                                <label for="title">Đang liên kết</label>
                                <select class="form-control" name="nowurl" id="nowurl">
                                    <?php if($menu->type=='products' && $menu->type!='custom'): ?>
                                         <option value="<?php echo e($menu->url); ?>"><?php echo e($menu->productsurl->name); ?></option>
                                    <?php elseif($menu->type!='custom' && $menu->type!='products'): ?>
                                        <option value="<?php echo e($menu->url); ?>"><?php echo e($menu->articlesurl->name); ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        <?php endif; ?>


                        <div class="form-group">
                            <label for="title"><?php echo e(trans('VNPCMS.forms.labels.order')); ?></label>
                            <input type="number" name="order" class="form-control" id="order" value="<?php echo e($menu->order); ?>" min="1">
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" align="center">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-defaut" id="reset">Làm lại</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách <?php echo e($type->name); ?></h3>
            </div>

            <div class="box-body">
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
                <table id="alluserstable" class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên menu</th>
                        <th>Parent</th>
                        <th>Type</th>
                        <th>Liên kết</th>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
                        <th><?php echo e(trans('VNPCMS.forms.tables.columns.action')); ?></th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $menus as $menu ): ?>
                        <tr>
                            <td><?php echo e($menu->id); ?></td>
                            <td>
                                <?php if($menu->children->count()!=0): ?>
                                    <b><a href="<?php echo e(url('admin/menus/'.$type->code.'?sub='.$menu->id)); ?>" style="text-decoration: none"><?php echo e($menu->name); ?></a></b>
                                <?php else: ?>
                                    <?php echo e($menu->name); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($menu->parent_id!=0): ?>
                                    <b><a href="<?php echo e(url('admin/menus/'.$type->code.'?sub='.$menu->parent->parent_id)); ?>" style="text-decoration: none"><?php echo e($menu->parent->name); ?></a></b>
                                <?php else: ?>
                                    Menu gốc
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($menu->type); ?>


                            </td>
                            <td>
                                <?php echo e($menu->link); ?>

                            </td>
                            <td>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
                                <a class="btn btn-xs btn-default btn-flat" href="<?php echo e(url('admin/menus/'.$type->code.'/edit/'.$menu->id)); ?>">
                                    <i class="fa fa-edit text-blue"></i><?php echo e(trans('VNPCMS.forms.titles.edit')); ?>

                                </a>
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
                                <button type="button" data-productid="<?php echo e($menu->id); ?>" data-productname="<?php echo e($menu->name); ?>" data-productdeleteurl="<?php echo e(url('admin/menus/delete/'.$menu->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmProductsDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.delete')); ?>"></i></button>
                                <?php if($menu->submenu=='yes'): ?>
                                    <a class="btn btn-xs btn-default btn-flat" href="<?php echo e(url('admin/menus/'.$type->code.'?sub='.$menu->id)); ?>">
                                        <i class="fa fa-plus text-blue"></i>
                                    </a>
                                <?php endif; ?>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <?php endif; ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="confirmProductsDelete">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><?php echo e(trans('VNPCMS.pages.subtitles.confirmproductsdeletion')); ?></h4>
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
        $(document).ready(function(){
            $(".select2").select2();
        });

        $('#reset').click(function(){
            location.reload();
        });

        $('#type').change(function(){
            var type = $('#type').val();
            if(type!="custom")
            {
                $("#renderdata").css("display","block");
                $("#renderlink").css("display","none");
                $("#renderarticle").css("display","none");
                $("#renderurl").css("display","none");
            }else{
                $("#renderdata").css("display","none");
                $("#renderlink").css("display","block");
                $("#renderarticle").css("display","none");
                $("#renderurl").css("display","none");
            }

            if(type=="products"){
                $("#groups").css("display","block");
            }
            else{
                $("#groups").css("display","none");
            }
        });
    </script>

    <script>
        $('#data').change(function(){
            var data = $('#data').val();
            var type = $('#type').val();
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
            if(data=="articles"){
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
                        data3 += seach.name;
                        data3 += '</option>';
                        opt += data3;
                    });
                    $("#renderarticle").css("display","block");
                    $('#article').html(opt);
                }).fail(function(jsonData) {
                    alert('error send data');
                });
            }

            if(data=="groups"){
                $("#renderurl").css("display","none");
                $.ajax({
                    url: '<?php echo e(url('admin/urlgroups')); ?>',
                    dataType: "json",
                    type: "post",
                    data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', data: data, type: type}
                }).done(function(jsonData) {
                    var opt = "";
                    $.each(jsonData, function (i, seach) {
                        var data3 = '<option value='+seach.id+'>';
                        data3 += seach.name;
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
<?php $__env->startSection('footerscripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>