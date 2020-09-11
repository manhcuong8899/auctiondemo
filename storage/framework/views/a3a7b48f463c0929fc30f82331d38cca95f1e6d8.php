<div class="list-col-left">
    <div class="nav-left">
        <div class="nav-group">
            <h3>NHÓM SẢN PHẨM</h3>
            <ul>
                <?php foreach($listgroups as $key=>$value): ?>
                    <li><a href="<?php echo e(url('nhom-san-pham/'.$value->slug)); ?>"><?php echo e($value->name); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div><!-- /.list-col-left -->