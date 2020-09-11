<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('themes.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
<div id="page"  class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>

    <!-- ==========  HEADER ================= -->
    <div id="pheader">
        <div class="header clearfix">
            <?php echo $__env->make('themes.includes.logo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="hright">
                <?php echo $__env->make('themes.includes.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div><!-- /.header -->
    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
    <div class="pmain">
            <?php echo $__env->make('themes.includes.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('main-content'); ?>
    </div>
    <!-- ==========  MAIN : END ============= -->

        <?php echo $__env->make('themes.includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ==========  FOOTER =================-->

    <div id="footer">
        <?php echo $__env->make('themes.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- ==========  FOOTER : END =========== -->
        <p id="back-top" style="display: block;"> <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> </p>
        <?php echo $__env->make('themes.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script type="text/javascript">
            function get_info_cart() {
                var num = $('.cart_list li').length;
                $('.cart_list .num_product').html(num);
                var totalWidth = 0;
                $('.cart_list li').each(function(index) {
                    var class_id = $(this).find('.ch4_contentItems').attr('class').split(' ');
                    var id = class_id[1];
                    var price = $('.'+id + ' .ch4_cartItemPrice').text();
                    var price = price.replace('$', '');
                    totalWidth += Number(price);
                });
                $('#subTotalAmount').html('$'+totalWidth);
                var shipping = get_price_number($('.ch4_summaryShippingDropDown').val());
                var total= totalWidth+shipping;
                $('#totalAmt').html('$'+total);
            }
            function delRowProduct(id,rowid){
                var $div = $('.ch4_contentItems.'+id).closest('li');
                $div.slideUp(function(){
                    $div.remove();
                    get_info_cart();
                });
                $.ajax({
                    url: '<?php echo e(url('cart/deleteitem')); ?>',
                    dataType: "html",
                    type: "post",
                    data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', rowId: rowid}
                }).done(function(data) {
                    window.location.href = data;
                }).fail(function(data) {
                    alert('Xảy ra lỗi xóa sản phẩm trong giỏ hàng!');
                });
            }

        </script>
</div>
    <?php echo $__env->yieldContent('page-script'); ?>
<!-- ===============  PAGE : END =============== -->
</body>
</html>