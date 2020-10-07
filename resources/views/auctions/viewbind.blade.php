@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Danh sách tài khoản đặt đấu giá mua sản phẩm</h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách người đặt đấu giá</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="allauctions" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Địa chỉ ví</th>
                        <th>Họ và Tên</th>
                        <th>Giá đặt</th>
                        <th>Thời gian đặt</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Địa chỉ ví</th>
                        <th>Họ và Tên</th>
                        <th>Giá đặt</th>
                        <th>Thời gian đặt</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@stop
@section('footerscripts')
    <script>
        var contract = '{{CRMSettings('contractaddress')}}';
        var proid = '{{$proid}}';
        // Gán các thông tin đấu giá
        getBindCount(contract,proid,function (totalBind){
            if(totalBind==0){
            }else{
                var stt =1;
                for (var j = totalBind-1; j >=0; j--){
                    getBidProduct(contract,proid,j,function (data){
                        var date = new Date(data[5]*1000);
                        $('#allauctions').DataTable().row.add([
                            stt,data[1], data[2], data[4], date
                        ]).draw();
                        stt++;
                    });
                }
            }
        });

        $('#allauctions').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

    </script>
@endsection