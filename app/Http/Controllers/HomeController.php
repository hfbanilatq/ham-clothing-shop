<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["products"] = Product::all();
        return view('home.index')->with("viewData", $viewData);
    }
}
