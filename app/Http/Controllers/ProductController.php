<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('product.title');
        $viewData["subtitle"] = __('sub.product');
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName().__('product.os');
        $viewData["subtitle"] = $product->getName().__('product.pi');
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData["title"] = __('product.title.create.product');
        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Product::validate($request);
        Product::create($request->only(["name","price"]));
        return back();
    }
}
