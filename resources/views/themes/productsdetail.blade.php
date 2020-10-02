<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="{{ asset('themes/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/assets/vendors/owcarousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/assets/vendors/zoom/easyzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/assets/vendors/select/css/select2.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('themes/assets/css/media-style.css') }}">
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
                @include('themes.includes.menu_top')
            </div>
        </div><!-- /.header -->

        @include('themes.includes.trending')

    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
        <div class="pmain">
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

        <script src="{{ asset('themes/assets/vendors/icheck/icheck.js') }}"></script>
        <script src="{{ asset('themes/assets/vendors/zoom/easyzoom.js') }}"></script>
        <script src="{{ asset('themes/assets/vendors/select/js/select2.js') }}"></script>
</div>
    @yield('page-script')
<!-- ===============  PAGE : END =============== -->
</body>
</html>