<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hero;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    function index(){
        $heros = Hero::all();
        $services = Service::all();
        return view("index",compact("heros","services"));
    }
    function portfolio(){
        $categories = Category::with('products')->get();
        $products = Product::with('category')->get();
        return view('portfolio',compact('categories','products'));
    }
}
