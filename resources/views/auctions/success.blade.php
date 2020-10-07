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
                <h3 class="box-title">Danh sách phiên bán đấu giá thành công</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="allauctions" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sàn</th>
                        <th>Giá bán</th>
                        <th>Thời gian kết thúc phiên</th>
                        <th>Thắng đấu giá</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sàn</th>
                        <th>Giá bán</th>
                        <th>Thời gian kết thúc phiên</th>
                        <th>Thắng đấu giá</th>
                        <th>Trạng thái</th>
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
           for(var i=Total-1; i>=0; i--){
               queryProduct(contract,i,function (data) {
                   var date = new Date(data[3]*1000).toUTCString("en-US",{timeZone: "Asia/Ho_Chi_Minh"});
                   var name = getstatus(data[6],data[3]);
                   if(data[6]==4){
                       var urlview ='{{url('admin/auctions/viewbind')}}/'+data[0];
                       getWinner(contract,data[0],function (awinner) {
                           $('#allauctions').DataTable().row.add([
                               stt, '<a href="'+urlview+'" title="Hiển thị danh sách người đặt đấu giá mua sản phẩm này">' + data[1] +'<a>', parseInt(data[4]) +1 + ' ETH', data[5] + ' ETH', date, '<font color="#ff0000">'+awinner[2]+'<font>' + '<br>'+awinner[1],name
                           ]).draw();
                           stt++;
                       })


                   }

               })
           }
        });
        function getstatus(status,date){
            var name;
                name='<span style="color: #0505cd"> Hoàn thành</span>';
            return name;
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