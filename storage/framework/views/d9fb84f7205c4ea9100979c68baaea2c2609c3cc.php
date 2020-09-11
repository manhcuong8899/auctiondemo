<?php $__env->startSection('page_title'); ?>
Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="list-col-right">
        <div class="list-products">
            <h2><?php echo e($viewgroup->name); ?><span></span></h2>
            <div class="row">
<?php foreach(viewProduct($viewgroup->id) as $key=>$list): ?>
                <div class="col-5">
                    <div class="grid-item hot-product">
                        <div class="item-box">
                            <div class="cover"><a href="<?php echo e(url($list->slug)); ?>"><img src="<?php echo e(asset('public/images/products/'.$list->model.'/'.$list->images)); ?>" alt="<?php echo e($list->name); ?>" class="imgresponsive"></a></div>
                            <div class="info-product">
                                <div class="info-color">
                                    <div class="number-of-colors"><?php echo e(\VNPCMS\Products\Products::colors($list->name)); ?> Màu</div>
                                </div>
                                <div class="info-view-color">
                                    <div class="multi-item-carousel carousel slide"  data-interval="false" id="inner-product-<?php echo e($list->id); ?>">
                                        <div class="carousel-inner">
                                            <?php foreach(\VNPCMS\Products\Products::Models($list->name) as $key=>$model): ?>
                                            <div class="item <?php if($key==0): ?>active <?php endif; ?>">
                                                <div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">
                                                    <a href="<?php echo e(url($model->slug)); ?>" data-img-big="<?php echo e(asset('public/images/products/'.$model->model.'/'.$model->images)); ?>"><img src="<?php echo e(asset('public/images/products/'.$model->model.'/'.$model->images)); ?>" class="img-responsive"></a></div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <a class="left carousel-control" href="#inner-product-<?php echo e($list->id); ?>" data-slide="prev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                        <a class="right carousel-control" href="#inner-product-<?php echo e($list->id); ?>" data-slide="next">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3><a href="<?php echo e(url($list->slug)); ?>"><?php echo e($list->name); ?></a></h3>
                                <div class="product-subtitle"><?php echo e($list->cates->parent->name); ?>-<?php echo e($list->cates->name); ?></div>
                                <div class="price"><span><?php echo e(number_format($list->price,'0',',','.')); ?></span><?php if($list->listprice!=0): ?><span class="old"><?php echo e(number_format($list->listprice,'0',',','.')); ?></span><?php endif; ?></div>
                                <?php if($list->listprice!=0): ?><div class="hot-percent">-<?php echo e(round(100-($list->price/$list->listprice)*100,0)); ?>%</div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>




            </div>
        </div>
    </div><!-- /.list-col-right -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.groups', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>