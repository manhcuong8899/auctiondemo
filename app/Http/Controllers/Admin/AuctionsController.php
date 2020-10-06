<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class AuctionsController extends Controller
{

    /**
     * Instance of VNPCMS\News\Repository\NewsRepositoryInterface
     *
     * @var Object
     */
    private $productsRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductsRepositoryInterface $articlesRepository)
    {
        $this->productsRepository = $articlesRepository;

        $this->middleware('auth');
        $this->middleware('permission:product_management');
    }

    /**
     *
     * @return View;
     **/
    public function index()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $now = strtotime($now);
        return view('auctions.index',compact('now'));
    }
    public function active()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $now = strtotime($now);
        return view('auctions.active',compact('now'));
    }
    public function inactive()
    {
        return view('auctions.inactive');
    }
    public function finish()
    {
        return view('auctions.finish');
    }
    public function success()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $now = strtotime($now);
        return view('auctions.success');
    }

}