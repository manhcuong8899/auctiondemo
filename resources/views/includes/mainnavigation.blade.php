@can('config_management')
<li class="header"><i class="fa fa-bars" style="margin-right:5px;"></i> NỘI DUNG QUẢN TRỊ</li>
@endcan
@can('product_management')
    <li class="treeview {{setMenuActive('admin/products')}}">
        <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Quản lý sản phẩm</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="{{ setMenuActive('admin/products') }}"><a href="{{url('admin/products')}}"><i class="fa fa-list"></i>Tất cả sản phẩm</a></li>
            <li class="{{ setMenuActive('admin/create/products') }}"><a href="{{url('admin/create/products')}}"><i class="fa fa-plus"></i>Thêm mới sản phẩm</a></li>
            <li class="{{ setMenuActive('admin/products/status/pending') }}"><a href="{{url('admin/products/status/pending')}}"><i class="fa fa-warning"></i>Sản phẩm chờ mở phiên</a></li>
            <li class="{{ setMenuActive('admin/products/status/active') }}"><a href="{{url('admin/products/status/active')}}"><i class="fa fa-opencart"></i>Sản phẩm mở phiên</a></li>
            <li class="{{ setMenuActive('admin/products/status/inactive') }}"><a href="{{url('admin/products/status/inactive')}}"><i class="fa fa-close"></i>Sản phẩm phiên kết thúc</a></li>
        </ul>
    </li>
@endcan
@can('customer_management')
    <li class="treeview {{ setMenuActive('admin/customer') }}">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Quản lý khách hàng</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="{{ setMenuActive('admin/customer') }}"><a href="{{url('admin/customer')}}"><i class="fa fa-list"></i>Tất cả khách hàng</a></li>
            <li class="{{ setMenuActive('admin/customer/gold') }}"><a href="{{url('admin/customer/gold')}}"><i class="fa fa-user-secret"></i>Thành viên vàng</a></li>
            <li class="{{ setMenuActive('admin/customer/silver') }}"><a href="{{url('admin/customer/silver')}}"><i class="fa fa-user-circle-o"></i>Thành viên bạc</a></li>
            <li class="{{ setMenuActive('admin/customer/bronze') }}"><a href="{{url('admin/customer/bronze')}}"><i class="fa fa-user-secret"></i>Thành viên đồng</a></li>
            <li class="{{ setMenuActive('admin/customer/regular') }}"><a href="{{url('admin/customer/regular')}}"><i class="fa fa-user-secret"></i>Thành viên thường</a></li>

        </ul>
    </li>
@endcan
@can('image_management')
    <li class="treeview {{setMenuActive('admin/images')}}">
        <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Quản lý hình ảnh</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="{{ setMenuActive('admin/images') }}"><a href="{{url('admin/images')}}"><i class="fa fa-child"></i>Danh sách hình ảnh</a></li>
            <li class="{{ setMenuActive('admin/create/images') }}"><a href="{{url('admin/create/images')}}"><i class="fa fa-child"></i>Thêm mới hình ảnh</a></li>
        </ul>
@endcan
@can('config_management')
<li class="treeview {{ setMenuActive('admin/config') }}">
    <a href="#">
        <i class="fa fa-cog"></i>
        <span>Quản lý cấu hình</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">

        @can('categories_management')
            <li class="treeview {{setMenuActive('admin/cate')}}">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Cấu hình danh mục</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach(categories() as $value)
                        <li class="{{ setMenuActive('admin/cate/'.$value->code) }}"><a href="{{url('admin/cate/'.$value->code)}}"><i class="fa {{$value->fa}}"></i>Danh mục {{$value->name}}</a></li>
                    @endforeach
                </ul>

            </li>
        @endcan
            @can('menu_management')
                <li class="treeview {{setMenuActive('admin/menus')}}">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Cấu hình menu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @foreach(Menus() as $value)
                            <li class="{{ setMenuActive('admin/menus/'.$value->code) }}"><a href="{{url('admin/menus/'.$value->code)}}"><i class="fa fa-child"></i>{{$value->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endcan
        <li class="{{ setMenuActive('admin/settings/general') }}"><a href="{{url('admin/settings/general')}}"><i class="fa fa-cloud"></i>Cấu hình chung</a></li>
    </ul>
</li>
@endcan
