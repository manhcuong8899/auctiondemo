<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('config_management')): ?>
<li class="header"><i class="fa fa-bars" style="margin-right:5px;"></i> NỘI DUNG QUẢN TRỊ</li>
<?php endif; ?>
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('product_management')): ?>
    <li class="treeview <?php echo e(setMenuActive('admin/products')); ?>">
        <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Quản lý sản phẩm</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo e(setMenuActive('admin/products')); ?>"><a href="<?php echo e(url('admin/products')); ?>"><i class="fa fa-list"></i>Danh sách sản phẩm</a></li>
            <li class="<?php echo e(setMenuActive('admin/create/products')); ?>"><a href="<?php echo e(url('admin/create/products')); ?>"><i class="fa fa-plus"></i>Thêm mới sản phẩm</a></li>
            <li class="<?php echo e(setMenuActive('admin/groupproducts')); ?>"><a href="<?php echo e(url('admin/groupproducts')); ?>"><i class="fa fa-object-group"></i>Quản lý nhóm sản phẩm</a></li>
            <li class="<?php echo e(setMenuActive('admin/products/import')); ?>"><a href="<?php echo e(url('admin/products/import')); ?>"><i class="fa fa-file-excel-o"></i>Nhập liệu- Sửa đổi Excel</a></li>
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
<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('orderonline_management')): ?>
    <li class="treeview <?php echo e(setMenuActive('admin/order/online')); ?>">
        <a href="#">
            <i class="fa fa-transgender-alt"></i>
            <span>Quản lý giao dịch</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo e(setMenuActive('admin/order/online')); ?>"><a href="<?php echo e(url('admin/order/online')); ?>"><i class="fa fa-child"></i>Tất cả đơn hàng</a></li>
            <?php foreach(GetStatusOrder() as $value): ?>
                <li class="<?php echo e(setMenuActive('admin/order/online/'.$value->code)); ?>"><a href="<?php echo e(url('admin/order/online/'.$value->code)); ?>"><i class="fa fa-child"></i><?php echo e($value->name); ?></a></li>
            <?php endforeach; ?>
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
        <li class="<?php echo e(setMenuActive('admin/settings/general')); ?>"><a href="<?php echo e(url('admin/settings/general')); ?>"><i class="fa fa-child"></i>Cấu hình chung</a></li>
        <li class="<?php echo e(setMenuActive('admin/banks')); ?>"><a href="<?php echo e(url('admin/banks')); ?>"><i class="fa fa-child"></i>Cấu hình địa chỉ Ví</a></li>
        <li class="<?php echo e(setMenuActive('admin/units')); ?>"><a href="<?php echo e(url('admin/units')); ?>"><i class="fa fa-child"></i>Đơn vị sản phẩm</a></li>
    </ul>
</li>
<?php endif; ?>

