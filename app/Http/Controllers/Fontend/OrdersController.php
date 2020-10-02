<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use App\Models\Profile;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use VNPCMS\Banks\Banks;
use VNPCMS\Catearticle\CateArticles;
use VNPCMS\Flasher\Facades\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Utils\FileUtils;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use VNPCMS\Orders\OrderDetail;
use VNPCMS\Orders\Orders;
use VNPCMS\Products\Products;
use Illuminate\Support\Facades\Response;
use VNPCMS\Setting\Setting;
use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Methods\Eth;


class OrdersController extends Controller
{

    public function postorder(Request $request)
    {
        $ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, "https://ropsten.infura.io/v3/b7f2ce93c320460eaaef396b9f547f7b");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2000);

        // grab URL and pass it to the browser
        curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        $cart =  Cart::instance('cart')->content();
        $total = getTotal($cart);
        $qty = getQty($cart);
        $coupons = getDownprice($cart);
        $input = $request->all();
        $phone = $request->phone;
        $user = Auth::user();
        if(validatePhone($phone)==false){
            return Redirect()->back()->withErrors('Định dạng số điện thoại không đúng!')->withInput();
        }
/* check thông tin đầu vào table order */
        $phone = format_phone($phone);
        $input['phone'] = $phone;
        $nullphone = Profile::where('phone',$phone)->get()->count();
        $input['customer_id']=$user->id;

        if($request->emailbill==''){
            $input['emailbill'] = $request->email;
        }
        if($request->phonepay==''){
            $input['phonepay'] = $phone;
        }
        if($request->phone2pay==''){
            $input['phone2pay'] = $phone;
        }
        /* Gán thông tin hóa đơn*/

         $input['total'] = $total;
         $input['discount'] = $coupons;
        $code = createRandomCoupons();
        $input['code'] = $code;
        $input['status'] = 1;
        /* Tạo dữ liệu bảng order*/
        $order = Orders::create($input);

        $contractAddress ="0x3B50960f8C54b68B4a94bD5ADb0d173aa3ECbe8f";
        $functionName = "createOrder";
        $abi = file_get_contents(asset('public/contract/abi.json'));
        $bytecode = file_get_contents(asset('public/contract/bytecode.txt'));
        $web3 = new Web3('https://ropsten.infura.io/v3/b7f2ce93c320460eaaef396b9f547f7b');
        $contract = new Contract($web3->provider, $abi);
        $contract->at($contractAddress)->send('createOrder',
            $order->id,
            $request->address,
            Auth::user()->full_name,
            Auth::user()->email,
            $total,
            $qty,[
                'from' => $request->address,
                'value'=>$total,
                'gas' => '0x200b20'],
                function ($err, $result) use ($contract) {
            if ($err !== null) {
                 throw $err;
            }
            if ($result) {
                 echo $result;
            }
        });

        /* Tạo dữ liệu bảng chi tiết order*/
        foreach($cart as $index=>$value)
        {
            $data = array(
                 'order_id'=>$order->id,
                 'product_id'=>$value->id,
                 'price'=>$value->price,
                 'quantity'=>$value->qty,
                 'totalprice'=>$value->price*$value->qty,
                 'size'=>$value->options->size,
                 'weight'=>$value->options->weight,
                 'color'=>$value->options->color,
                 'coupon'=>$value->options->coupons,
                 'fee'=>$value->options->ship,
                );
            OrderDetail::create($data);
        }
        if(session()->has('counpons')==true){
        $idcoupon = Session::get('counpons')[0]['id'];
        $setcoupon = Coupons::find($idcoupon);
        if($setcoupon->quantity>0){
            $setcoupon->quantity = $setcoupon->quantity-1;
            $setcoupon->save();
        }
        }
        Cart::instance('cart')->destroy();
        Session::forget('counpons');
        return redirect('successorder');

    }

}