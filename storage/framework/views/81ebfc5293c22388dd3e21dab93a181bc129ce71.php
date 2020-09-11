<?php $__env->startSection('page_title'); ?>
    Trang thông tin cá nhân
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="col-sm-9">
        <div class="acc-right">
            <h3 class="ch4_title text-uppercase">Thông tin liên hệ</h3>

            <form class="login-form" role="form" method="POST" action="<?php echo e(url('members/update')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="inputName" class="control-label">Email <b>*</b></label>
                    <input type="text" class="form-control" required value="<?php echo e($user->email); ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Di động <b>*</b></label>
                    <input type="text" class="form-control" required <?php if($profile!=null): ?>value="<?php echo e($profile->phone); ?>"<?php endif; ?> name="phone">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Địa chỉ ví <b>*</b></label>
                    <input type="text" class="form-control" required <?php if($profile!=null): ?>value="<?php echo e($profile->wallet); ?>"<?php endif; ?> name="wallet">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Mật Khẩu <b>*</b></label>
                    <div class="password-container clearfix">
                        <span class="password-encrypted">****************</span>
                        <div class="password-edit-button-container right">
                            <button class="password-edit-button ebtn" type="button" data-toggle="modal" data-target="#myModalChangepass">Đổi mật khẩu</button>
                        </div>
                    </div>

                </div>

                <div class="subNameForm">
                    <h3 class="mTitle">Thông tin riêng</h3>
                </div>

                <div class="form-group">
                    <label class="control-label">Ngày sinh <b>*</b></label>
                    <input type="date" class="form-control" required <?php if($profile!=null): ?>value="<?php echo e($profile->birthday); ?>"<?php endif; ?> name="birthday" id="birthday">
                </div>


                    <div class="form-group">
                        <label for="inputName" class="control-label">Họ và tên<b>*</b></label>
                        <input type="text" class="form-control" required value="<?php echo e($user->full_name); ?>" name="full_name">
                    </div>


                <div class="subNameForm">
                    <h3 class="mTitle">Thông tin địa chỉ</h3>
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Địa chỉ <b>*</b></label>
                    <input type="text" class="form-control" required <?php if($profile!=null): ?>value="<?php echo e($profile->address); ?>"<?php endif; ?> name="address">
                </div>

                <p class="sText sm2-padding"><span class="requiredColor">*</span>&nbsp;Thông tin bắt buộc</p>
                <div class="ch4_formButtonRow linebox">
                    <button class="ch4_btn ch4_btnBlack" type="reset">HỦY BỎ</button>
                    <button type="submit" class="ch4_btn ch4_btnOrange">LƯU LẠI</button>
                </div>
            </form>

        </div>
    </div><!-- /.col-sm  -->
  <?php /*  <div class="col-sm-3">
        <p class="font-bold font12">Hạng thành viên</p>
        <div class="img-member"><img src="assets/images/hang.png" class="imgresponsive" alt="Nike"></div>
    </div>*/ ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('themes/assets/vendors/validator/validator.js')); ?>"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            $('#myform').validator()
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.members', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>