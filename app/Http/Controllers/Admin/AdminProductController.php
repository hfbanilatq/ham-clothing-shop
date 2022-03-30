<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Admin Page - Products - Online Store";
        $viewData['products'] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Create Product Page - Ham Store';
        $viewData['categories'] = Category::all();
        return view('admin.product.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::validate($request);
        $categoryInDatabase = Category::findOrFail($request->input('category'));
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setColor($request->input('color'));
        $newProduct->setSize($request->input('size'));
        $newProduct->setQuantityInStock($request->input('quiantity_in_stock'));
        $newProduct->setCategory($categoryInDatabase);
        $newProduct->setImage('test.jpg');

        $storeInterface = app(ImageStorage::class);
        $savedImageName = $storeInterface->store($request);
        if($savedImageName !== null) {
            $newProduct->setImage($savedImageName);
        }

        $newProduct->save();
        return back()->with('success', 'Product created');
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Admin Page - Edit Product - Online Store";
        $viewData['product'] = Product::findOrFail($id);
        return view('admin.product.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Numeric  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::validate($request);

        Product::validate($request);
        $editProduct = Product::findOrFail($id);
        $editProduct->setName($request->input('name'));
        $editProduct->setDescription($request->input('description'));
        $editProduct->setPrice($request->input('price'));
        $editProduct->setColor($request->input('color'));
        $editProduct->setSize($request->input('size'));
        $editProduct->setQuantityInStock($request->input('quiantity_in_stock'));
        $editProduct->setImage('test.jpg');

        $storeInterface = app(ImageStorage::class);
        $savedImageName = $storeInterface->store($request);
        if($savedImageName !== null) {
            $editProduct->setImage($savedImageName);
        }

        $editProduct->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }
}