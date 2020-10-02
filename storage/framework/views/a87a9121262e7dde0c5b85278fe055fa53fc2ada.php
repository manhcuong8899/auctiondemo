<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('config_management')): ?>
<li class="header"><i class="fa fa-bars" style="margin-right:5px;"></i> NỘI DUNG QUẢN TRỊ</li>
<?php endif; ?>
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
    <li class="treeview <?php echo e(setMenuActive('admin/products')); ?>">
        <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Quản lý phiên đấu giá</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo e(setMenuActive('admin/products')); ?>"><a href="<?php echo e(url('admin/products')); ?>"><i class="fa fa-list"></i>Tất cả các phiên</a></li>
            <li class="<?php echo e(setMenuActive('admin/create/products')); ?>"><a href="<?php echo e(url('admin/create/products')); ?>"><i class="fa fa-plus"></i>Thêm mới phiên</a></li>
            <li class="<?php echo e(setMenuActive('admin/products/status/pending')); ?>"><a href="<?php echo e(url('admin/products/status/pending')); ?>"><i class="fa fa-warning"></i>Phiên chờ đấu giá</a></li>
            <li class="<?php echo e(setMenuActive('admin/products/status/active')); ?>"><a href="<?php echo e(url('admin/products/status/active')); ?>"><i class="fa fa-opencart"></i>Phiên đang mở</a></li>
            <li class="<?php echo e(setMenuActive('admin/products/status/inactive')); ?>"><a href="<?php echo e(url('admin/products/status/inactive')); ?>"><i class="fa fa-close"></i>Phiên đã kết thúc</a></li>
        </ul>
    </li>
<?php endif; ?>
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
    <li class="treeview <?php echo e(setMenuActive('admin/customer')); ?>">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Quản lý khách hàng</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo e(setMenuActive('admin/customer')); ?>"><a href="<?php echo e(url('admin/customer')); ?>"><i class="fa fa-list"></i>Tất cả khách hàng</a></li>
            <li class="<?php echo e(setMenuActive('admin/customer/gold')); ?>"><a href="<?php echo e(url('admin/customer/gold')); ?>"><i class="fa fa-user-secret"></i>Thành viên vàng</a></li>
            <li class="<?php echo e(setMenuActive('admin/customer/silver')); ?>"><a href="<?php echo e(url('admin/customer/silver')); ?>"><i class="fa fa-user-circle-o"></i>Thành viên bạc</a></li>
            <li class="<?php echo e(setMenuActive('admin/customer/bronze')); ?>"><a href="<?php echo e(url('admin/customer/bronze')); ?>"><i class="fa fa-user-secret"></i>Thành viên đồng</a></li>
            <li class="<?php echo e(setMenuActive('admin/customer/regular')); ?>"><a href="<?php echo e(url('admin/customer/regular')); ?>"><i class="fa fa-user-secret"></i>Thành viên thường</a></li>

        </ul>
    </li>
<?php endif; ?>
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('image_management')): ?>
    <li class="treeview <?php echo e(setMenuActive('admin/images')); ?>">
        <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Quản lý hình ảnh</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo e(setMenuActive('admin/images')); ?>"><a href="<?php echo e(url('admin/images')); ?>"><i class="fa fa-child"></i>Danh sách hình ảnh</a></li>
            <li class="<?php echo e(setMenuActive('admin/create/images')); ?>"><a href="<?php echo e(url('admin/create/images')); ?>"><i class="fa fa-child"></i>Thêm mới hình ảnh</a></li>
        </ul>
<?php endif; ?>
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('config_management')): ?>
<li class="treeview <?php echo e(setMenuActive('admin/config')); ?>">
    <a href="#">
        <i class="fa fa-cog"></i>
        <span>Quản lý cấu hình</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">

        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('categories_management')): ?>
            <li class="treeview <?php echo e(setMenuActive('admin/cate')); ?>">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Cấu hình danh mục</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php foreach(categories() as $value): ?>
                        <li class="<?php echo e(setMenuActive('admin/cate/'.$value->code)); ?>"><a href="<?php echo e(url('admin/cate/'.$value->code)); ?>"><i class="fa <?php echo e($value->fa); ?>"></i>Danh mục <?php echo e($value->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>

            </li>
        <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('menu_management')): ?>
                <li class="treeview <?php echo e(setMenuActive('admin/menus')); ?>">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Cấu hình menu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php foreach(Menus() as $value): ?>
                            <li class="<?php echo e(setMenuActive('admin/menus/'.$value->code)); ?>"><a href="<?php echo e(url('admin/menus/'.$value->code)); ?>"><i class="fa fa-child"></i><?php echo e($value->name); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <li class="<?php echo e(setMenuActive('admin/settings/general')); ?>"><a href="<?php echo e(url('admin/settings/general')); ?>"><i class="fa fa-cloud"></i>Cấu hình chung</a></li>
    </ul>
</li>
<?php endif; ?>
