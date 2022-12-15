<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller {

    public function index() {
        $products = Product::latest()->get();
        return view('backend.product.manage', compact('products'));
    }

    public function create() {
        return view('backend.product.create');
    }

    public function store(Request $request) {
        $request->validate([
            'product_title' => 'required|max:150',
            'product_price' => 'required|min:1',
            'product_description' => 'required',
            'product_image' => 'required | image|mimes:png,jpg,jpeg,svg,webp'
        ]);
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $image = $request->product_image;
        if($image) {
            $folder = 'db-images/product-image/';
            $imageName = 'product' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $imageName);
            $product->product_image = $folder . $imageName;
        } else {
            $product->product_image = 'demo.jpg';
        }
        $product->save();
        return redirect()->route('product.manage')->with('message', 'Product Add Successfully');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $request->validate([
            'product_title' => 'required|max:150',
            'product_price' => 'required|min:1',
            'product_description' => 'required',
        ]);
        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $image = $request->product_image;
        if($image) {
            $deleteImage = $product->product_image;
            $folder = 'db-images/product-image/';
            $imageName = 'product' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $imageName);
            $product->product_image = $folder . $imageName;
            if(File::exists($deleteImage)) unlink($deleteImage);
        }
        $product->save();
        return redirect()->route('product.manage')->with('message', 'Product Updated Successfully');
    }
    
    public function delete($id) {
        $product = Product::find($id);
        $deleteImage = $product->product_image;
        $product->delete();
        if(File::exists($deleteImage)) unlink($deleteImage);
        return redirect()->route('product.manage')->with('message', 'Product Deleted Successfully');
    }

    public function status($id) {
        $product = Product::find($id);
        $status = $product->status;
        if(1 == $status) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->status = $status;
        $product->save();
        return redirect()->route('product.manage');
    }

}
