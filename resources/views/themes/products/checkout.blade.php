@extends('themes.checkout')

@section('page_title')
 Thanh toán
@endsection
@section('main-content')
    <div id="ch4_mainNav" class="clearfix">
        <div id="ch4_continueShopping"><a href="product.html">Chọn thêm sản phẩm</a></div>
        <div id="ch4_helpContainerTopNav">
            <div class="ch4_helpFacebook"><a href="{{($settings['linkfanpage'])}}"><i class="fa fa-facebook"></i> Facebook</a></div>
            <div class="ch4_helpContactTop">{{($settings['hotline'])}}</div>
        </div>
    </div>
    <div class="container">
        <div class="product-detail">
            <div class="pageTitle">Thanh toán </div>
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{url('order')}}" method="POST" id="myform" class="form-horizontal">
                        {!! csrf_field() !!}
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
                                                    <input type="text" disabled class="form-control" id="lastname" name="full_name" required value="{{\Illuminate\Support\Facades\Auth::user()->full_name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 ch4_formLabel">Số điện thoại <span class="requiredColor">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" disabled class="form-control" id="phone" name="phone" required value="{{\Illuminate\Support\Facades\Auth::user()->profile->phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 ch4_formLabel">Email <span class="requiredColor">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" disabled class="form-control" id="firstname" name="email" required value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
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
                                            @if(\Illuminate\Support\Facades\Auth::user()->hasProfile()==true)
                                                <div class="form-group">
                                                    <label class="col-sm-3 ch4_formLabel">Địa chỉ nhận hàng <span class="requiredColor">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"  id="address" name="address" required value="{{\Illuminate\Support\Facades\Auth::user()->profile->address}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 ch4_formLabel">Địa chỉ Ví<span class="requiredColor">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control wallet"  id="address" name="address" required value="{{\Illuminate\Support\Facades\Auth::user()->profile->wallet}}">                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label class="col-sm-3 ch4_formLabel">Địa chỉ nhận hàng <span class="requiredColor">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="address" name="address" required>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div><!-- shippingSection -->

                                    <div class="ch4_formButtonRow">
                                        <span class="requiredLabel"><span class="requiredColor">*</span>&nbsp;Thông tin bắt buộc</span>
                                        <input class="ch4_btn ch4_btnOrange next" id="CreateOrder" value="XÁC NHẬN">
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end Update 24/4 -->
                        </form>
                </div><!--/.col-8-->

                <div class="col-sm-4">
                    <!-- Update 24/4 -->
                    <div class="summarySection">
                        <div class="summarySectionTitle">Thông Tin Chung</div>
                        <div class="summaryContent">
                            <div class="summaryCol clearfix">
                                <div class="left">GIÁ ĐẶT (TỔNG SP)</div>
                                <div class="right"><span class="sum_price">{{number_format($total,'2',',','.')}}</span></div>
                            </div>
                            <div class="summaryCol clearfix">
                                <div class="left">CHIẾT KHẤU</div>
                                <div class="right"><span class="sum_sale">{{number_format($coupons,'2',',','.')}}</span></div>
                            </div>
                            <div class="summaryCol clearfix">
                                <div class="left">PHÍ VẬN CHUYỂN</div>
                                <div class="right"><span class="sum_ship">LIÊN HỆ</span></div>
                            </div>

                            <div class="summaryCol clearfix summaryTotal">
                                <div class="left">TỔNG GIÁ ĐẶT</div>
                                <div class="right"><span class="sum_total">{{number_format($total-$coupons,'2',',','.')}}</span></div>
                            </div>

                        </div>
                    </div>

                    <div class="summarySection">
                        <div class="summarySectionTitle">DANH SÁCH ĐẤU GIÁ </div>
                        <div class="summaryContent">
                            <div class="summaryList">
                                @foreach( $cart as $index=>$carts )
                                <div class="cartItem">
                                    <div class="summaryItemImg"><img src="{{asset('public/images/products/'.$carts->options->model.'/'.$carts->options->images)}}" class="imgresponsive"></div>
                                    <div class="summaryItemContent">
                                        <h4 class="summaryItemTitle">{{$carts->name}}</h4>
                                        <p class="ch4_cartItemOptions">
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:{{$carts->qty}}</span>
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Chiết khấu:</span>{{number_format($carts->options->coupons,'0',',','.')}}</span>
                                        </p>
                                        <p class="orange">{{number_format(($carts->price*$carts->qty) - $carts->options->coupons,'2',',','.')}} ETH</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- end Update 24/4 -->


                </div><!--/.col-4-->
            </div><!-- /.row-->

        </div><!-- /.page-view -->
    </div><!-- /.container -->

@endsection
@section('page-script')
    @endsection