<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý phiên</h1>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách phiên trống</h3>
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
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footerscripts'); ?>
    <script>
        var contract = '<?php echo e(CRMSettings('contractaddress')); ?>';
        getProductCount(contract,function(Total){
            var stt =1;
            var proid = Total-1;
           for(var i=Total-1; i>=0; i--){
               queryProduct(contract,i,function (data) {
                   var date = new Date(data[3]*1000).toUTCString("en-US",{timeZone: "Asia/Ho_Chi_Minh"});
                   var name = getstatus(data[6]);
                   if(data[6]==2){
                       $('#allauctions').DataTable().row.add([
                           stt,  data[1] , data[4] + ' ETH', data[5] + ' ETH', date, name
                       ]).draw();
                       stt++;
                       proid--;
                   }

               })
           }
        });
        function getstatus(status){
            var name;
                name='Không người đặt';
            return name;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>