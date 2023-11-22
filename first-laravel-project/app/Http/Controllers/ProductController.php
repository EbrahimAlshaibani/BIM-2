<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Product::truncate();
        $products = Product::with('category','images')
        // // ->where('category_id',1)
        // // ->orWhere('price',">=",2408)
        // // ->where('name','like','__sa%')
        // // ->max('price');
        // // ->where('price', '>', 1000)
        // // ->Where(function ($query) {
        // //     $query->Where('category_id' , 1)
        // //     ->orWhere('name','like', "Mr%");
        // // })
        // // ->orWhere('category_id' , 1)
        // // ->orWhere('name','like', "Mr%")
        // // ->Where('category' , 1)
        // // ->whereBetween('price', [1000, 2500])
        // // ->whereNotBetween('price', [1000, 2500])
        // // ->WhereNot('category_id' , 1)
        // // ->whereIn('category_id' , [1,3])
        // // ->whereNotIn('category_id' , [1,3])
        // // ->whereNull('url')
        // // ->whereNotNull('url')
        // // ->whereDate('created_at', '2023-11-13')
        // // ->whereMonth('created_at', '10')
        // // ->whereColumn([
        // //     ['updated_at', '>', 'created_at'],
        // // ])
        // // ->where('category.name','=',"Ahmed")
        // orderBy('price','asc')
        // ->limit(10)
        // ->orderBy('id','desc')
        // ->get();
        // ->whereBetween('created_at',[Carbon::today(), Carbon::today()->subSecond(1)->addDay()])
        ->paginate(10);
        // dd(Carbon::today()->subSecond(1)->addDay() );
        // $products = Product::where('name','like', "Mr%")->firstOrFail();
        // $products = Product::find(1);
        // ->get();
        // dd($products->toSql());
        // $user = User::with('Profile')->where('status', 1)->whereHas('Profile', function($q){
        //     $q->where('gender', 'Male');
        // })->get();

        return view("product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("product.create",compact("categories"));
    }
    public function add()
    {
        $categories = Category::all();
        return view("product.ajax",compact("categories"));
    }
    public function post(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json("The product $product->name was successfully added");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "required",
            "seller" => "required",
            'price' => 'decimal:2,2'
        ]);
        $product = Product::create($request->all());
        return redirect()->route("products.index")->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("product.edit", compact("product",'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        if($request->hasFile("images")){
            foreach($product->images as $image){
                File::delete('uploads/images/'.$image->url);
            }
            $product->images()->delete();
            foreach ($request->file('images') as $key => $image) {
                $newFileName = time() ."$key.". $image->getClientOriginalExtension();
                $image->move(public_path('uploads/images'), $newFileName);
                Image::create([
                    'product_id' => $product->id,
                    'url'=>$newFileName
                ]);
            }
        }
        return redirect()->route("products.index")->with("success","The Product $product->name was edited Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
