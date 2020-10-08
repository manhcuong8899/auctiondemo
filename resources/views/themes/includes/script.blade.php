<!-- SCRIPTS -->
<script src="{{ asset('themes/assets/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('themes/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/assets/js/webslidemenu.js') }}"></script>
<script src="{{ asset('themes/assets/vendors/owcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('themes/assets/vendors/jcarousellite/jquery.jcarousellite.js') }}"></script>
<script src="{{ asset('themes/assets/js/index.js') }}"></script>
<script src="{{ asset('themes/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('node_modules/web3/dist/web3.js') }}"></script>
<script src="{{ asset('themes/assets/js/connect_metamask.js') }}"></script>
<script src="{{ asset('themes/assets/js/dapp.js') }}"></script>
<script src="{{ asset('themes/assets/js/eth.js') }}"></script>

<script>
    $('#submitregister').click(function() {
        var email =  $('#myModalRegister [name="email"]').val();
        var password =  $('#myModalRegister [name="password"]').val();
        var confirmpassword =  $('#myModalRegister [name="confirmpassword"]').val();
        var full_name =  $('#myModalRegister [name="full_name"]').val();
        var phone =  $('#myModalRegister [name="phone"]').val();
        var city =  $('#myModalRegister [name="city"]').val();
        var address =  $('#myModalRegister [name="address"]').val();
        $.ajax({
            url: '{{url('member/register')}}',
            dataType: "json",
            type: "post",
            data: {_method: 'post', _token: '{{csrf_token()}}',email:email,password:password,full_name:full_name,phone:phone,city:city,address:address,confirmpassword:confirmpassword}
        }).done(function (data){
          if(data.check==false){
              $('#myModalRegister [name="message"]').css("display","block");
              $('#myModalRegister [name="message"]').html(data.message);
          }else{
              window.location.href = data.redirect;
          }
        }).fail(function (data) {
            alert('Lỗi gửi dữ liệu');
        });
    });
</script>



