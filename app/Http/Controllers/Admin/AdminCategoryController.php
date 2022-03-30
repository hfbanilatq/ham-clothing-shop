<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Category List Page - Online Store";
        $viewData["categories"] = Category::all();
        return view('admin.category.index')->with("viewData", $viewData);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Admin Create Category Page - Ham Store";
        return view('admin.category.create')->with("viewData", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::validate($request);
        Category::create($request->only('description'));

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryToEdit = Category::findOrFail($id);
        $viewData = [];
        $viewData["title"] = "Admin Create Category Page - Ham Store";
        $viewData["category"] = $categoryToEdit;
        return view('admin.category.edit')->with("viewData", $viewData);
    }


/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Numeric  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Category::validate($request);

        $categoryToEdit = Category::findOrFail($id);
        $categoryToEdit->setDescription($request->input('description'));
        $categoryToEdit->save();

        return redirect()->route('admin.category.index');
    }
}
