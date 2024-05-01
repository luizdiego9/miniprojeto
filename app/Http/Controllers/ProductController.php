<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("produto.index", compact('products'));
    }
    public function register()
    {
        $brands = Brand::all();
        return view("produto.form", compact('brands'));
    }

    public function create(request $request)
    {

        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand()->associate($data['brand']);
        $product->save();

        return redirect(route('produto'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view("produto.edit", compact('product', 'brands'));
    }


    public function save(Product $product, Request $request)
    {
        $data = $request->all();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand()->associate($data['brand']);
        $product->update();

        return redirect(route('produto'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('produto'));
    }
}
