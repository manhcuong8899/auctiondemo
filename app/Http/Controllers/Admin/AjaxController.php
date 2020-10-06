<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use App\Models\Groupproducts;
use App\Utils\Carts;
use Flash;
use Cart;
use Illuminate\Http\Request;
use VNPCMS\Catearticle\Repository\CateArticlesRepositoryInterface;
use VNPCMS\Catearticle\CateArticlesApplicationService;
use VNPCMS\Catearticle\CateArticles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use VNPCMS\Products\Products;
use VNPCMS\Article\Articles;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    /**
     * Instance of VNPCMS\News\Repository\NewsRepositoryInterface
     *
     * @var Object
     */
    private $catesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CateArticlesRepositoryInterface $cateRepository)
    {
        $this->catesRepository = $cateRepository;
        $this->middleware('auth');
    }

    public function urlcategories(Request $request)
{
    $data = $request->data;
    $type = $request->type;
    $cates = $this->catesRepository->getData($type);
    $rendercates= cate_parent($cates);
    return response($rendercates);
}

    public function cateforproperty(Request $request)
    {
        $data = $request->data;
        $property = CateArticles::find($data);
        $cates = $this->catesRepository->getData('products');
        $rendercates= categories_properties($cates,0,"--",$property);
        return response($rendercates);
    }
/* Hàm hiển thị danh mục gán vào mã giảm giá trong view sửa mã giảm giá */
    public function editcouponscate(Request $request)
    {
        $cp = Coupons::find($request->coupon);
        $cates = $this->catesRepository->getData('products');


        if($cp->data=='categories') {
            $rendercates= categories_coupons($cates,0,"--",$cp);
        }
        else {
            $rendercates= cate_parent($cates);
        }

        return response($rendercates);
    }

    /* Hàm hiển thị sản phẩm gán vào mã giảm giá trong view sửa mã giảm giá */

    public function editurlproducts(Request $request)
    {
        $cp = Coupons::find($request->pon);
        $products = Products::where('status',1)->get()->toArray();
        if($cp->data=='products'){
            $renderproducts= products_coupons($products,$cp);
            return response($renderproducts);
        }
        else{
            $renderproducts = Products::where('status',1)->get();
            return response::json($renderproducts);
        }

    }

    /* --------- ------------ */


    /* Hàm hiển thị danh mục gán vào nhóm sản phẩm trong view sửa mã giảm giá */
    public function editgroupscate(Request $request)
    {
        $cp = Groupproducts::find($request->coupon);
        $cates = $this->catesRepository->getData('products');


        if($cp->data=='categories') {
            $rendercates= categories_coupons($cates,0,"--",$cp);
        }
        else {
            $rendercates= cate_parent($cates);
        }

        return response($rendercates);
    }

    /* Hàm hiển thị sản phẩm gán vào nhóm sản phẩm trong view sửa mã giảm giá */

    public function editgroupsproducts(Request $request)
    {
        $cp = Groupproducts::find($request->pon);
        $products = Products::where('status',1)->get()->toArray();
        if($cp->data=='products'){
            $renderproducts= products_coupons($products,$cp);
            return response($renderproducts);
        }
        else{
            $renderproducts = Products::where('status',1)->get();
            return response::json($renderproducts);
        }

    }

    /* --------- ------------ */
    public function urlarticles(Request $request)
    {
        $data = $request->data;
        $type = $request->type;
        $articales = Articles::where('group',$type)
            ->where('status',1)->get();
        if($type=="products")
        {
            $articales = Products::where('status',1)->get();
        }
        return response::json($articales);
    }


    /* --------- ------------ */
    public function urlgroups(Request $request)
    {
        $data = $request->data;
        $type = $request->type;
        $articales = Groupproducts::where('status',1)->get();
        return response::json($articales);
    }

    public function bindproduct(Request $request)
    {
        $p = Products::find($request->proId);
        $data = array(
            'id'=>$p->id,
            'name'=>$p->name,
            'starttime'=>strtotime($p->starttime),
            'endtime'=>strtotime($p->endtime),
            'price'=>$p->price,
        );
        return response::json($data);
    }

    public function changestatus(Request $request)
    {
        $p = Products::where('bind',$request->proId)->first();
        $p->status = 2;
        $p->save();
        $data = array(
            'id'=> $p->id,
            'status'=> $p->status
        );
        return response::json($data);
    }
    public function resetproduct(Request $request)
    {
        $p = Products::find($request->proId);
        $p->status = 0;
        $p->bind = null;
        $p->save();
        $data = array(
            'id'=> $p->id,
            'status'=> $p->status,
            'bind'=> $p->bind
        );
        return response::json($data);
    }

    public function postBindId(Request $request)
    {
        $p = Products::find($request->proid);
        $p->bind = $request->bindid;
        $p->status = 1;
        $p->save();
        $data = array(
            'id'=> $p->id,
            'bindid'=> $p->bind,
        );
        return response::json($data);
    }

}