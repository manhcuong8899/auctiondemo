@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý phiên</h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách phiên đang đóng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="allauctions" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sàn</th>
                        <th>Giá hiện tại</th>
                        <th>Thời gian kết thúc phiên</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sàn</th>
                        <th>Giá hiện tại</th>
                        <th>Thời gian kết thúc phiên</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
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
        getProductCount(contract,function(Total){
            var stt =1;
            var proid = Total-1;
           for(var i=Total-1; i>=0; i--){
               queryProduct(contract,i,function (data) {
                   var date = new Date(data[3]*1000).toUTCString("en-US",{timeZone: "Asia/Ho_Chi_Minh"});
                   var name = getstatus(data[6],data[3]);
                   var html = actions(data[6],data[3],proid);
                   if(data[6]==3){
                       $('#allauctions').DataTable().row.add([
                           stt, '<a href="auction/viewbind/'+proid+'" title="Hiển thị danh sách người đặt đấu giá mua sản phẩm này">' + data[1] +'<a>', data[4] + ' ETH', data[5] + ' ETH', date, name,html
                       ]).draw();
                       stt++;
                       proid--;
                   }

               })
           }
        });
        function getstatus(status,date){
            var name;
                name='<span style="color: #000000"> <b>Đã đóng phiên</b></span>';
            return name;
        }
        function actions(status,date,id){
            var html="";
                html='<a id="'+id+'" class="btn btn-xs btn-default btn-flat"  onclick="Getcoin(this.id);"> <i class="fa fa-bitcoin text-red"></i> Nhận Coin</a>';
            return html;
        }

        function PushEndAuction(id){
            var contract = '{{CRMSettings('contractaddress')}}';
            endAuction(contract,id,function(kq) {
               console.log(kq);
            });
        }
        function Getcoin(id){
            var contract = '{{CRMSettings('contractaddress')}}';
              GetCoinFromWinner(contract,id);
        }

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