<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $products = Product::where('status', 1)->get();
        return view('frontend.pages.index', compact('products'));
    }

    public function details($id) {
        $product = Product::find($id);
        return view('frontend.pages.details', compact('product'));
    }

    public function allProduct() {
        $products = Product::where('status', 1)->get();
        $page = 'All Products';
        return view('frontend.pages.product-page', compact('products', 'page'));
    }

}
