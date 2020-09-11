<?php $__env->startSection('page_title'); ?>
   Giỏ hàng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div id="ch4_mainNav" class="clearfix">
        <div id="ch4_continueShopping"><a href="/">Chọn thêm sản phẩm đấu giá</a></div>
        <div id="ch4_helpContainerTopNav">
            <div class="ch4_helpFacebook"><a href="<?php echo e(($settings['linkfanpage'])); ?>"><i class="fa fa-facebook"></i> Facebook</a></div>
            <div class="ch4_helpContactTop"><?php echo e(($settings['hotline'])); ?></div>

        </div>
    </div>
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-8">
                    <div class="cart_list">
                        <h2 class="heading">Sản phẩm đã tham gia đấu giá (<span class="num_product"><?php echo e($cart->count()); ?></span>)</h2>
                        <ul class="list-unstyled">
                            <?php foreach($cart as $index=>$carts ): ?>
                            <li>
                                <div class="ch4_contentItems <?php echo e($carts->id); ?>">
                                    <div class="row">
                                        <div class="col-sm-4 cart_img">
                                            <a href="<?php echo e(url($carts->options->slug)); ?>">
                                                <img src="<?php echo e(asset('public/images/products/'.$carts->options->model.'/'.$carts->options->images)); ?>" class="imgresponsive">
                                            </a>
                                        </div><!--.col-4-->
                                        <div class="col-sm-8">
                                            <div class="ch4_cartItemPricing">
                                                <p class="ch4_cartItemPrice"><span><?php echo e(number_format(($carts->price*$carts->qty) - $carts->options->coupons,'8',',','.')); ?> ETH</span> <br><?php if($carts->options->coupons!=0): ?><span style="text-decoration: line-through; color: #000000"><?php echo e(number_format($carts->price*$carts->qty,'0',',','.')); ?></span><?php endif; ?></p>
                                            </div>
                                            <div class="ch4_cartItemOptionsContainer">
                                                <a href="<?php echo e(url($carts->options->slug)); ?>" class="ch4_cartItemTitle"><?php echo e($carts->name); ?></a>
                                                <div class="ch4_cartItemOptions">
                                                    <div class="ch4_cartItemOption">
                                                        <span class="ch4_cartItemLabel">Đơn giá:</span>
                                                        <span class="cartnum_price"><?php echo e(number_format($carts->price,'8',',','.')); ?> ETH</span>
                                                    </div>
                                                    <div class="ch4_cartItemOption">
                                                        <span class="ch4_cartItemLabel">Thành tiền:</span>
                                                        <span class="cartnum_qty"><?php echo e($carts->qty); ?></span> x
                                                        <span class="cartnum_price"><?php echo e(number_format($carts->price,'8',',','.')); ?> ETH</span>
                                                    </div>
                                                    <div class="ch4_cartItemOption">
                                                        <span class="ch4_cartItemLabel">Giảm theo mã:</span>
                                                        <span class="cartnum_price"><?php echo e(number_format($carts->options->coupons,'8',',','.')); ?> ETH</span>
                                                    </div>
                                                </div>
                                                <div class="ch4_miniTools">
                                                    <div class="style-select-model">
                                                        <label>Số lượng</label>
                                                        <select class="model_cart_qty" name="newquantity<?php echo e($carts->id); ?>">
                                                            <option value="<?php echo e($carts->qty); ?>" selected><?php echo e($carts->qty); ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3">4</option>
                                                            <option value="3">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ch4_cartItemActions ch4_lgRes">
                                                <button id="<?php echo e($carts->id); ?>" class="ch4_btn" onclick="delRowProduct(this.id,this.value);" value="<?php echo e($index); ?>">Xóa</button>
                                                <button id="<?php echo e($carts->id); ?>" class="ch4_btn" onclick="updateRowProduct(this.id,this.value);" value="<?php echo e($index); ?>">Cập nhật</button>
                                            </div>

                                        </div><!--.col-8-->
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>


                </div><!--/.col-8-->
                <div class="col-sm-4">
                    <div id="ch4_summaryContent">
                        <div class="ch4_summaryTitle">Thông tin chung</div>
                        <div class="ch4_summaryRow">
                            <span class="ch4_promoLabel">Mã giảm giá</span>
                            <?php if(\Illuminate\Support\Facades\Session::has('counpons')): ?>
                            <div class="promoCode">
								<span>
									<input type="text" class="promoCode-input" placeholder="<?php echo e(\Illuminate\Support\Facades\Session::get('counpons')[0]['code']); ?>" name="coupon" disabled>
								</span>
								<span>
									<input type="button" value="Hủy" class="promoCode-btn btn_White" id="btncancercoupon">
								</span>
                            </div>
                                <?php else: ?>
                                <div class="promoCode">
								<span>
									<input type="text" class="promoCode-input" placeholder="Mã Code" name="coupon">
								</span>
								<span>
									<input type="button" value="Nhập" class="promoCode-btn btn_White" id="btncoupon">
								</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="ch4_summarySubtotal ch4_summaryRow">
                            Giá đặt (Tổng số SP)
                            <span id="subTotalAmount" class="ch4_right"><?php echo e(number_format($total,'8',',','.')); ?> ETH</span>
                        </div>

                        <div id="ch4_summaryTotal" class="ch4_itemName ch4_summaryRow">
                            Chiết khấu <span id="totalAmt" class="ch4_right"><?php echo e(number_format($coupons,'8',',','.')); ?> ETH</span>
                        </div>
                        <div id="ch4_summaryTotal" class="ch4_itemName ch4_summaryRow">
                            Tổng giá đặt<span id="totalAmt" class="ch4_right"><?php echo e(number_format($total-$coupons,'8',',','.')); ?> ETH</span>
                        </div>

                        <div id="ch4_summaryButtons" class="ch4_summaryRowEnd ">
                            <a href="<?php echo e(url('checkout')); ?>" class="ch4_btn ch4_btnOrange ch4_itemName">ĐẤU GIÁ</a>
                        </div>
                    </div>
                    <div class="ch4_siderbar sidebar_transport">
                        <div class="ch4_title">PHÍ VẬN CHUYỂN</div>
                        <p>(Phí trên chưa bao gồm giao hàng đấu giá tận nhà) chi tiết xem tại <a class="text_under_big" href="#" target="_blank">Chính sách vận chuyển</a></p>
                    </div>

                </div><!--/.col-4-->
            </div><!-- /.row-->

        </div><!-- /.page-view -->
    </div><!-- /.container -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>
        function updateRowProduct(id,rowid){
            var sizeproduct = $('select[name=newsize'+id+']').val();
            var quantity = $('select[name=newquantity'+id+']').val();
            $.ajax({
                url: '<?php echo e(url('cart/updateitem')); ?>',
                dataType: "html",
                type: "post",
                data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', rowId: rowid, newsize: sizeproduct, newquantity: quantity}
            }).done(function(data) {
                window.location.href = data;
            }).fail(function(data) {
                alert('Xảy ra lỗi update sản phẩm trong giỏ hàng!!');
            });
        }

        /* Get Coupon*/
        $('#btncoupon').click(function(){
            var code = $('input[name=coupon]').val();
            var url = '<?php echo e(url('cart')); ?>'
            $.ajax({
                url: '<?php echo e(url('coupons')); ?>',
                dataType: "html",
                type: "post",
                data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>', code: code}
            }).done(function(data){
                if(data=='true'){
                    window.location.href = url;
                }else{
                    alert('Mã giảm giá không chính xác!');
                }
            }).fail(function(data) {
                alert('Xảy ra lỗi!!');
            });
        });
        /* Get Coupon*/
        $('#btncancercoupon').click(function(){
            $.ajax({
                url: '<?php echo e(url('cancercoupons')); ?>',
                dataType: "html",
                type: "post",
                data: {_method: 'post', _token: '<?php echo e(csrf_token()); ?>'}
            }).done(function(data){
                window.location.href = data;
            }).fail(function(data) {
                alert('Xảy ra lỗi!!');
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>