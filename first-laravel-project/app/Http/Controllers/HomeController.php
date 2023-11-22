<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $products = Product::all();
        // $products_per_month = $products->count();
        $products = Product::where('created_at', '>=', Carbon::now()->subMonths())
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "products"')
        ));
        $products_1 = Product::where('created_at', '>=', Carbon::now()->subMonths())
        ->where('category_id',1)
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "products"')
        ));
        $products_2 = Product::where('created_at', '>=', Carbon::now()->subMonths())
        ->where('category_id',2)
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "products"')
        ));
        $products_3 = Product::where('created_at', '>=', Carbon::now()->subMonths())
        ->where('category_id',3)
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "products"')
        ));
        // dd($products_per_month);
        return view('home',compact('products_1','products_2','products_3','products'));
    }
}
