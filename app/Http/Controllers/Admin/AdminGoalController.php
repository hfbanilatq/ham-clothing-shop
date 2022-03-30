<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin List Goal Page- Online Store";
        $viewData["products"] = Product::all();
        return view('admin.goal.index')->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Admin Create Goal Page - Ham Store";
        return view('admin.goal.create')->with("viewData", $viewData);
    }

    public function store(Request $request) {

    }
}
