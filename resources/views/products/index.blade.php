@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sản phẩm</h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách sản phẩm</h3>
            </div>
            <div class="box-body">
                @can('product_management')
                <a class="btn btn-success btn-md" href="{{url('admin/create/products')}}">
                    <i class="fa fa-plus"></i> {{ trans('VNPCMS.forms.buttons.addnew') }}
                </a>
                @endcan
                <br style="clear:both;">
                <br style="clear:both;">
                @can('product_management')
                <table id="listproduct" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{ trans('VNPCMS.forms.tables.columns.id') }}</th>
                        <th>{{ trans('VNPCMS.forms.tables.columns.name') }}</th>
                        <th>Giá sản phẩm (ETH)</th>
                        <th>Giá sàn (ETH)</th>
                        <th>Số lượng</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Trạng thái</th>
                        @if(isset($status) && $status==0)
                        @can('product_management')
                        <th>{{ trans('VNPCMS.forms.tables.columns.action') }}</th>
                        @endcan
                            @endif
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $products as $product )
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                                <td><input class="form-control" value="{{ number_format($product->price,2,'.',',')}}" id="price{{$product->id}}" style="width: 60px"></td>
                                 <td><font color="#ff0000"> {{ number_format($product->price +1,2,'.',',')}} ETH</font> </td>
                                <td><input class="form-control" value="{{ $product->quantity}}" id="quantity{{$product->id}}" style="width: 60px"></td>
                                <td><input type="text" class="form-control" value="{{ $product->starttime}}" id="starttime{{$product->id}}" style="width: 150px"></td>
                                <td>

                                    <input type="text" class="form-control" value="{{ $product->endtime}}" id="endtime{{$product->id}}" style="width: 150px">
                                </td>
                            <td>
                                <?php
                                $checktime = \App\Http\Controllers\Controller::checkendtime($product->starttime,$product->endtime);
                                ?>
                                    @if($checktime==1 && $product->status==1 )
                                        <a id="{{$product->id}}"  onclick="PushProduct(this.id);"> <i class="fa fa-check text-blue"></i></a> Đang mở phiên
                                    @elseif($checktime==2 && $product->status==1)
                                        <a id="{{$product->id}}"  onclick="PushProduct(this.id);"> <i class="fa fa-times-circle text-purple"></i></a> Hết thời gian
                                        @elseif ($checktime==2 && $product->status==2)
                                        <a id="{{$product->id}}"  onclick="PushProduct(this.id);"> <i class="fa fa-check text-blue"></i></a> Đã đóng phiên
                                        @else
                                        <a id="{{$product->id}}"  onclick="PushProduct(this.id);"> <i class="fa fa fa-times text-red"></i></a> Chưa mở phiên
                                        @endif
                            </td>
                            <td>
                                @can('product_management')
                                    @if($checktime==1 && $product->status==1 )

                                    @elseif($checktime==2 && $product->status==1)
                                    <a id="{{$product->id}}" class="btn btn-xs btn-default btn-flat"  onclick="ressetproduct(this.id);"> <i class="fa fa fa-product-hunt text-red"></i> Thu sản phẩm</a>

                                    @else
                                        <a id="{{$product->id}}" class="btn btn-xs btn-default btn-flat"  onclick="PushProduct(this.id);"> <i class="fa fa fa-plus text-blue"></i> Mở Phiên</a>
                                        <a data-productname="{{$product->name}}" data-productid="{{$product->id}}" data-updaterurl="{{url('admin/products/aupdate/'.$product->id)}}" title="Cập nhật sản phẩm" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#aUpdateDialog">
                                            <i class="fa fa-edit text-blue"></i>Cập nhật
                                        </a>
                                        <a class="btn btn-xs btn-default btn-flat" href="{{url('admin/products/edit/'.$product->id)}}">
                                            <i class="fa fa-edit text-blue"></i>{{ trans('VNPCMS.forms.titles.edit') }}
                                        </a>
                                        <button type="button" data-productid="{{ $product->id }}" data-productname="{{$product->name}}"  data-productdeleteurl="{{ url('admin/products/delete/'.$product->id) }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmProductsDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title="Xóa sản phẩm"></i></button>
                                    @endif
                                @endcan</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ trans('VNPCMS.forms.tables.columns.id') }}</th>

                        <th>{{ trans('VNPCMS.forms.tables.columns.name') }}</th>

                        <th>{{ trans('VNPCMS.forms.tables.columns.status') }}</th>
                        <th>{{ trans('VNPCMS.forms.tables.columns.createdat') }}</th>
                        @can('product_management')
                        <th>{{ trans('VNPCMS.forms.tables.columns.action') }}</th>
                        @endcan
                    </tr>
                    </tfoot>
                </table>
                @endcan
                <div class="pagination-wrap">
                    <ul>
                        {!! $products->render() !!}
                    </ul>
                </div><!-- /.pagination-wrap -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tìm kiếm sản phẩm đấu giá</h3>
            </div>
            <form role="form" action="{{ url('admin/products/seach') }}" method="GET" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Danh mục sản phẩm</label>
                                <select class="form-control" name="categories">
                                    <?php function_add($cates); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Thông tin sản phẩm đấu giá</label>
                                <input type="text" name="nameseach" class="form-control" placeholder="Nhập Tên, Mã, nhãn hiệu sản phẩm">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" align="center">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>
        </div>

        @can('product_management')
        <div class="modal fade" tabindex="-1" role="dialog" id="confirmProductsDelete">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Xác nhận xóa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ trans('VNPCMS.forms.help.areyousure') }} <b><span id="productname"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ trans('VNPCMS.forms.buttons.close') }}</button>
                        {!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
                        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> {{ trans('VNPCMS.forms.buttons.delete') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        @endcan
        <div class="modal fade" tabindex="-1" role="dialog" id="aUpdateDialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Xác nhận cập nhật sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn cập nhận sản phẩm <b><span id="productname"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ trans('VNPCMS.forms.buttons.close') }}</button>
                        {!! Form::open(['method' => 'UPDATE', 'id'=>'aupdate']) !!}
                        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-edit"></i> Cập nhật</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

    </section><!-- /.content -->
@stop
    <script>
        function ressetproduct(proid) {
            $.ajax({
                url: '{{url('admin/resetproduct')}}',
                dataType: "json",
                type: "post",
                data: {_method: 'post', _token: '{{csrf_token()}}', proId: proid}
            }).done(function(data){
                alert('Thu hồi sản phẩm thành công');
                location.reload();
            }).fail(function(data){
                alert('Lỗi Resset sản phẩm');
            });
        }

        function PushProduct(id){
            var contractaddress ='{{CRMSettings('contractaddress')}}';
            var urlpro = '{{url('admin/updateprobind')}}';
            var seller = '{{CRMSettings('wallet')}}';
            $.ajax({
                url: '{{url('admin/bindproduct')}}',
                dataType: "json",
                type: "post",
                data: {_method: 'post', _token: '{{csrf_token()}}', proId: id}
            }).done(function(data){
               createProduct(contractaddress,data.id,seller,data.name,data.starttime,data.endtime,data.price,function (getblock){
                  if(getblock==true){
                      getProductCount(contractaddress,function(Total){
                              $.ajax({
                                  url: urlpro,
                                  dataType: "json",
                                  type: "post",
                                  data: {_method: 'post', _token: '{{csrf_token()}}', proid: id, bindid:Total-1}
                              }).done(function(data){
                                  alert('Hoàn thành quá trình tạo phiên!');
                                  location.reload();
                              }).fail(function(data){
                                  alert('Lỗi không thể tạo phiên ');
                              });
                      });
                  }else{
                      alert('Lỗi, Buồn quá');
                  }
               });
            }).fail(function(data){
                alert('Không thể đẩy sản phẩm lên sàn đấu giá');
            });
        }
        $('#listproduct').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>