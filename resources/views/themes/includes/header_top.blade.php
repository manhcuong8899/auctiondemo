<div class="navbar-top clearfix">
    <ul class="list-inline left navbar-top-left">
        <li><a href="{{($settings['linkfanpage'])}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="skype:{{$settings['skype']}}?chat"><i class="fa fa-skype"></i></a></li>
        <li><a href="#"><i class="fa fa-phone-square"></i> {{$settings['hotline']}}</a></li>
    </ul>

        <ul class="list-inline right navbar-top-right navbar-login">
            @if (Auth::guest())
            <li>
                <span data-toggle="modal" data-target="#myModalSignIn">ĐĂNG NHẬP</span>
                <span>/</span>
                <span data-toggle="modal" data-target="#myModalRegister">ĐĂNG KÝ</span>
            </li>
            @else
                <li class="dropdown">
                    <span id="dropdownMenu1" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->full_name}}</span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{url('members/orders')}}">Lịch sử đấu giá</a></li>
                        <li><a href="{{url('members/show')}}">Thông tin tài khoản</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModalChangepass">Đổi mật khẩu</a></li>
                        <li><a href="{{ url('admin/logout') }}">Thoát</a></li>
                    </ul>
                </li>
                @endif
        </ul>
</div>
<!-- /.navbar-top -->