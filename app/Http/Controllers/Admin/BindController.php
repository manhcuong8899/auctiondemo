<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Join;
use App\Models\Join_mode;
use App\Models\Join_property;
use Illuminate\Support\Facades\DB;
use VNPCMS\Catearticle\CateArticles;
use VNPCMS\Flasher\Facades\Flash;
use Illuminate\Http\Request;
use VNPCMS\Catearticle\Repository\CateArticlesRepositoryInterface;
use Illuminate\Support\Facades\App;
use App\Utils\FileUtils;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use VNPCMS\Products\Products;
use VNPCMS\Products\ProductsApplicationService;
use VNPCMS\Products\Repository\ProductsRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\Linktype;
use App\Models\SupperMenus;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class BindController extends Controller
{

    /**
     * Instance of VNPCMS\News\Repository\NewsRepositoryInterface
     *
     * @var Object
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductsRepositoryInterface $articlesRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:product_management');
    }

    /**
     *
     * @return View;
     **/



    public function postbindproduct(Request $request)
    {
        $p = Products::find($request->proId);
        dd($p);
        $data = array(
            'id'=>$p->id,
            'name'=>$p->name,
            'starttime'=>$p->starttime,
            'endtime'=>$p->endtime,
            'price'=>$p->price,
        );
        return response::json($data);
    }




}