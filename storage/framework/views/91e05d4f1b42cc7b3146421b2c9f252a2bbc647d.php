<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo e(trans('VNPCMS.pages.titles.'.$group)); ?></h1>
    </section>
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e(trans('VNPCMS.pages.subtitles.editcate')); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(url('admin/cate/update/'.$group.'/'.$cate->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('PATCH'); ?>

                        <?php echo csrf_field(); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="title"><?php echo e(trans('VNPCMS.forms.labels.catename')); ?></label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo e($cate->name); ?>">
                            </div>
                            <?php if($cate->images!=""): ?>
                            <div class="form-group">
                                <img src="<?php echo e(asset('public/images/categories/'.$cate->group.'/'.$cate->images)); ?>" width="120">
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="file" id="images" name="images" class="file-loading" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="title">Mã danh mục</label>
                                <input type="text" name="code" class="form-control" id="code" value="<?php echo e($cate->code); ?>">
                            </div>
                            <div class="form-group <?php echo e($errors->has('short') ? ' has-error' : ' has-feedback'); ?>">
                                <label for="title"><?php echo e(trans('VNPCMS.forms.labels.short')); ?></label>
                                <textarea class="form-control" id="short" type="text" name="short"/> <?php echo e($cate->short); ?></textarea>
                                <?php if($errors->has('short')): ?>
                                    <span class="help-block">
												<strong><?php echo e($errors->first('short')); ?></strong>
											</span>
                                <?php endif; ?>
                            </div>
                                <div class="form-group <?php echo e($errors->has('parent_id') ? ' has-error' : ' has-feedback'); ?>">
                                    <label for="title"><?php echo e(trans('VNPCMS.forms.labels.cateparent')); ?></label>
                                    <select widthclass="form-control" id="parent_id" name="parent_id" class="form-control">
                                        <?php if($cate->hasParent()): ?>
                                        <option value="<?php echo e($cate->parent_id); ?>"><?php echo e($cate->parent->name); ?></option>
                                        <?php else: ?>
                                            <option value="0">Danh mục gốc</option>
                                        <?php endif; ?>
                                          <?php echo e(cate_parent($data,0,"--",$cate->parent_id)); ?>

                                    </select>
                                    <?php if($errors->has('parent_id')): ?>
                                        <span class="help-block">
												<strong><?php echo e($errors->first('parent_id')); ?></strong>
											</span>
                                    <?php endif; ?>
                                </div>

                            <div class="form-group">
                                <label for="title"><?php echo e(trans('VNPCMS.forms.labels.order')); ?></label>
                                <input type="number" name="cate_order" class="form-control" id="cate_order" value="1" min="1">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer" align="center">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Phục hồi</button>
                        </div>
                    </form>
                </div>
                </div>
            <!-- /.box -->
            <!-- Default box -->
                <div class="col-md-8">
                    <!-- Default box -->
                    <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('VNPCMS.pages.subtitles.listcate'.$group)); ?></h3>
                </div>
                <div class="box-body">
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('categories_management')): ?>
                  <table class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
						 <th>#ID</th>
                        <th>Tên danh mục</th>
                        <?php if($group=='products'): ?>
                            <th>Trung Quốc</th>
                        <?php endif; ?>
                        <th>Parent</th>
                        <th>Mã</th>

                        <th style="width:15%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $listCate as $list ): ?>
                        <tr>
                            <td><input class="form-control" value="<?php echo e($list->order); ?>" name="<?php echo e('order['.$list->id.']'); ?>" style="width: 50px"> </td>
                            <td>
                                   <b><?php echo e($list->id); ?></b> 
                            </td>
							<td>
                                <?php if($list->children->count()!=0): ?>
                                    <b><a href="<?php echo e(url('admin/cate/'.$group.'?parent='.$list->id)); ?>" style="text-decoration: none"><?php echo e($list->name); ?> (<b><font color="#ff0000"><?php echo e($list->children->count()); ?></font></b>) </a></b>
                                <?php else: ?>
                                    <?php echo e($list->name); ?>

                                <?php endif; ?>
                            </td>
                            <?php if($group=='products'): ?>
                                <td>
                                    <?php echo e($list->china); ?>

                                </td>
                            <?php endif; ?>
                            <td>
                                <?php if($list->parent_id!=0): ?>
                                    <b><a href="<?php echo e(url('admin/cate/'.$group.'?parent='.$list->parent->parent_id)); ?>" style="text-decoration: none"><?php echo e($list->parent->name); ?></a></b>
                                <?php else: ?>
                                    Danh mục gốc
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($list->code); ?></td>
                            <td>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('categories_management')): ?>
                                <a href="<?php echo e(url('admin/cate/edit/'.$list->group.'/'.$list->id)); ?>" data-toggle="tooltip" title="Sửa danh mục" class="btn btn-xs btn-default btn-flat"><i class="fa fa-edit text-blue"></i></a>
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('categories_management')): ?>
                               <?php /* <a data-orderurl="<?php echo e(url('admin/menu/edit/'.$list->group.'/'.$list->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#Addmenu">
                                <i class="fa fa-plus text-blue"></i> Gán menu</a>*/ ?>
                                <button type="button" data-cateid="<?php echo e($list->id); ?>" data-catename="<?php echo e($list->name); ?>" data-catedeleteurl="<?php echo e(url('admin/cate/delete/'.$list->id)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmCateDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title='.trans('VNPCMS.forms.titles.delete').'></i></button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" align="center"><button type="submit" class="btn btn-primary">Cập nhật</button> </td>
                    </tr>
                    </tbody>
                </table>
                    <?php endif; ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
                </div>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('categories_management')): ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="confirmCateDelete">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Xác nhận xóa danh mục</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo e(trans('VNPCMS.forms.help.areyousure')); ?><b><span id="catename"></span></b>?</p>
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
            </div>
    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscripts'); ?>
    <script src="<?php echo e(asset('plugins/fileinput/js/fileinput.min.js')); ?>"></script>
    <script>

        var btnCust = '';
        $("#images").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: ' &nbsp;&nbsp;Tải ảnh',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',

            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif","png"]
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>