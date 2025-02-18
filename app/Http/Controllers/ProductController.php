<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(): View
    {
        $get_product = Product::where('status', 1)->orderBy('id','desc')->paginate(10);
       // dd($get_product);
        return view('product', compact('get_product'));
    }
}
