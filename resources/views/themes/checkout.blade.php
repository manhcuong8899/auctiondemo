<!DOCTYPE html>
<html>
<head>
    @include('themes.includes.header')
</head>

<body>
<div id="page"  class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>

    <!-- ==========  HEADER ================= -->
    <div id="pheader">
        <div class="header clearfix">
            @include('themes.includes.logo')
            <div class="hright">
                @include('themes.includes.header_top')
            </div>
        </div><!-- /.header -->
    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
    <div class="pmain">
            @include('themes.includes.flash')
            @yield('main-content')
    </div>
    <!-- ==========  MAIN : END ============= -->

        @include('themes.includes.modal')
    <!-- ==========  FOOTER =================-->

    <div id="footer">
        @include('themes.includes.footer')
    </div>
    <!-- ==========  FOOTER : END =========== -->
        <p id="back-top" style="display: block;"> <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> </p>
        @include('themes.includes.script')
        <script type="text/javascript">
           $(document).on('ready', function(){
                    <?php
               if (isset($carts)){
                ?>
                $("#CreateOrder").click(function(){
                    var contractaddress= '{{$settings['contractaddress']}}';
                    var buyer = '{{\Illuminate\Support\Facades\Auth::user()->profile->wallet}}';
                    var buyer_name='';
                    var buyer_email='';
                    var Totalamount='{{$total}}';
                    var quantity='{{$carts->qty}}';
                    ordercreate(1,buyer_address,'Hoàng Mạnh Cường','hoangmanhcuong.hust@gmail.com',Buyer_eth,1);
            });



                <?php
                }
                ?>
               $('input[name="address-payment-other"]').on('ifChecked', function(event){
                    $('.cod-infos').show();
                });
                $('input[name="address-payment-other"]').on('ifUnchecked', function(event){
                    $('.cod-infos').hide();
                });

            });
        </script>
</div>
    @yield('page-script')
<!-- ===============  PAGE : END =============== -->
</body>
</html>