<form action="<?php echo e(url('order')); ?>" method="POST" id="myform" class="form-horizontal">
    <?php echo csrf_field(); ?>

    <!-- Update 24/4 -->
    <fieldset id="account_information" class="checkoutItems">
        <div class="checkoutHeading">
            1. Thông tin vận chuyển
            <button type="button" class="hideclass edit_step previous">Sửa</button>
        </div>
        <div class="checkoutShippingForm" style="display: block">
            <div class="shippingSection">
                <div class="singleAddress">
                    <div class="form-group">
                        <label class="col-sm-3 ch4_formLabel">Tên <span class="requiredColor">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" disabled class="form-control" id="lastname" name="full_name" required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->full_name); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 ch4_formLabel">Số điện thoại <span class="requiredColor">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" disabled class="form-control" id="phone" name="phone" required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->profile->phone); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 ch4_formLabel">Email <span class="requiredColor">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" disabled class="form-control" id="firstname" name="email" required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->email); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 ch4_formLabel">Thành phố/Tỉnh <span class="requiredColor">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="city" id="city">
                                <option>Thành phố/Tỉnh</option>
                                <option value="SG">Hồ Chí Minh</option>
                                <option value="HN" selected="selected">Hà Nội</option>
                                <option value="DDN">Đà Nẵng</option>
                                <option value="BD">Bình Dương</option>
                                <option value="DNA">Đồng Nai</option>
                                <option value="KH">Khánh Hòa</option>
                                <option value="HP">Hải Phòng</option>
                                <option value="LA">Long An</option>
                                <option value="QNA">Quảng Nam</option>
                                <option value="VT">Bà Rịa Vũng Tàu</option>
                                <option value="DDL">Đắk Lắk</option>
                                <option value="CT">Cần Thơ</option>
                                <option value="BTH">Bình Thuận  </option>
                                <option value="LDD">Lâm Đồng</option>
                                <option value="TTH">Thừa Thiên Huế</option>
                                <option value="KG">Kiên Giang</option>
                                <option value="BN">Bắc Ninh</option>
                                <option value="QNI">Quảng Ninh</option>
                                <option value="TH">Thanh Hóa</option>
                                <option value="NA">Nghệ An</option>
                                <option value="HD">Hải Dương</option>
                                <option value="GL">Gia Lai</option>
                                <option value="BP">Bình Phước</option>
                                <option value="HY">Hưng Yên</option>
                                <option value="BDD">Bình Định</option>
                                <option value="TG">Tiền Giang</option>
                                <option value="TB">Thái Bình</option>
                                <option value="BG">Bắc Giang</option>
                                <option value="HB">Hòa Bình</option>
                                <option value="AG">An Giang</option>
                                <option value="VP">Vĩnh Phúc</option>
                                <option value="TNI">Tây Ninh</option>
                                <option value="TN">Thái Nguyên</option>
                                <option value="LCA">Lào Cai</option>
                                <option value="NDD">Nam Định</option>
                                <option value="QNG">Quảng Ngãi</option>
                                <option value="BTR">Bến Tre</option>
                                <option value="DNO">Đắk Nông</option>
                                <option value="CM">Cà Mau</option>
                                <option value="VL">Vĩnh Long</option>
                                <option value="NB">Ninh Bình</option>
                                <option value="PT">Phú Thọ</option>
                                <option value="NT">Ninh Thuận</option>
                                <option value="PY">Phú Yên</option>
                                <option value="HNA">Hà Nam</option>
                                <option value="HT">Hà Tĩnh</option>
                                <option value="DDT">Đồng Tháp</option>
                                <option value="ST">Sóc Trăng</option>
                                <option value="KT">Kon Tum</option>
                                <option value="QB">Quảng Bình</option>
                                <option value="QT">Quảng Trị</option>
                                <option value="TV">Trà Vinh</option>
                                <option value="HGI">Hậu Giang</option>
                                <option value="SL">Sơn La</option>
                                <option value="BL">Bạc Liêu</option>
                                <option value="YB">Yên Bái</option>
                                <option value="TQ">Tuyên Quang</option>
                                <option value="DDB">Điện Biên</option>
                                <option value="LCH">Lai Châu</option>
                                <option value="LS">Lạng Sơn</option>
                                <option value="HG">Hà Giang</option>
                                <option value="BK">Bắc Kạn</option>
                                <option value="CB">Cao Bằng</option>
                            </select>
                        </div>
                    </div>
                    <?php if(\Illuminate\Support\Facades\Auth::user()->hasProfile()==true): ?>
                    <div class="form-group">
                        <label class="col-sm-3 ch4_formLabel">Địa chỉ nhận hàng <span class="requiredColor">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  id="address" name="address" required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->profile->address); ?>">
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label class="col-sm-3 ch4_formLabel">Địa chỉ nhận hàng <span class="requiredColor">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                        <?php endif; ?>
                </div>

                <div class="shippingMethod">
                    <div class="mTitle">Phí vận chuyển trong nước <br><span class="text-normal"></span></div>
                    <ul class="list-dotstyle">
                        <li>Tính theo phí vận chuyển của hãng vận chuyển.</li>
                        <li>Khách hàng thanh toán phí vận chuyển khi nhận hàng</li>
                        <li> Giá đấu giá tại Website chưa bao gồm phí vận chuyển</li>
                    </ul>
                </div>
            </div><!-- shippingSection -->

            <div class="ch4_formButtonRow">
                <span class="requiredLabel"><span class="requiredColor">*</span>&nbsp;Thông tin bắt buộc</span>
                <input type="button" value="Tiếp Tục" class="ch4_btn ch4_btnOrange next">
            </div>
        </div>
    </fieldset>
    <fieldset id="company_information" class="checkoutItems">
        <div class="checkoutHeading checkoutHeadingClosed">2. Thông tin thanh toán</div>
        <div class="checkoutShippingForm">
            <div class="paymentOptions">
                <div class="bTitle">Chọn phương thức thanh toán:</div>
                <div class="ch4_billingPaymentOptions">
                    <div class="cbrUnit">
                        <input type="radio" name="typeCard" class="typeCard" value="creditCard" checked="checked" >
                        <span><span id="creditLogo"></span>Thanh toán qua mạng Blockchain ETH</span>
                    </div>
                  <?php /*  <div class="cbrUnit">
                        <input type="radio" name="typeCard" class="typeCard" value="cod" >
                        <span> Tiền mặt khi nhận hàng (COD)</span>
                    </div>*/ ?>
                </div>
            </div><!--/.paymentOptions-->

            <div class="formSection">
                <div class="singleAddress">
                    <div class="typepayment hideclass creditCard">
                        <div class="creditCard_note">
                            <h2 class="mTitle">Địa chỉ ví thanh toán</h2>
                            <p> <input type="text" class="form-control wallet"  id="address" name="address" required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->profile->wallet); ?>"></p>
                        </div>

                    </div><!--/.creditCard-->
                    <div class="ch4_formButtonRow linebox">
                        <input class="ch4_btn ch4_btnOrange next" type="submit" value="XÁC NHẬN">
                    </div>
                </div><!-- /.singleAddress -->


            </div><!-- /.formSection -->

            <div class="ch4_yourPrivacy sText">
                <p class="sText"><span class="requiredColor">*</span> Thông tin bắt buộc</p>
            </div>

        </div><!-- /.checkoutShippingForm -->
    </fieldset>
    <!-- end Update 24/4 -->
</form>