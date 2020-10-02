<div class="acc-left">
    <h3 class="ch4_title text-uppercase">Danh mục</h3>
    <ul class="list-unstyled">
        <li <?php if($url=='show'): ?>class="active"<?php endif; ?>><a href="<?php echo e(url('members/show')); ?>"><i class="fa fa-cog"></i> Thông tin tài khoản</a></li>
        <li <?php if($url=='orders'): ?>class="active"<?php endif; ?>><a href="<?php echo e(url('members/orders')); ?>"><i class="fa fa-home"></i> Lịch sử đấu giá</a></li>
    </ul>
</div>