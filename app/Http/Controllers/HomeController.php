<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["products"] = Product::all();
        $viewData["categories"] = Category::all();
        return view('home.index')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        $searchInput = $request->input('search');
        $searchSelect = $request->input('category_id');
        
        $viewData = [];
        $viewData['title'] = "Products - Online Store";
        $viewData["categories"] = Category::all();
        $viewData['products'] = Product::where('name', 'LIKE', '%' . $searchInput . '%')
            
            ->orWhere('description', 'LIKE', '%' . $searchInput . '%')
            ->orWhere('color', 'LIKE', '%' . $searchInput . '%')
            ->orWhere('size', 'LIKE', '%' . $searchInput . '%')
            ->where('category_id', '=', $searchSelect)->get()   
            ;
        $viewData['search'] = $searchInput;
        return view('home.index')->with("viewData", $viewData);
    }
}
