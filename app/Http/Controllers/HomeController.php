<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["products"] = Product::all();
        $viewData["categories"] = Category::all();
        return view('home.index')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        $searchInput = $request->input('search');
        $searchSelect = $request->get('category_id');

        $viewData = [];
        $viewData['title'] = __('product.title');
        $viewData["categories"] = Category::all();
        $queryProducts = Product::where(function ($query) use ($searchInput) {
            $query->where('name', 'LIKE', '%' . $searchInput . '%')
                ->orWhere('description', 'LIKE', '%' . $searchInput . '%')
                ->orWhere('color', 'LIKE', '%' . $searchInput . '%')
                ->orWhere('size', 'LIKE', '%' . $searchInput . '%');
        });
        if($searchSelect) {
            $queryProducts = $queryProducts->where('category_id', '=', $searchSelect);
        }
        $viewData['products'] = $queryProducts->get();
        $viewData['search'] = $searchInput;
        return view('home.index')->with("viewData", $viewData);
    }
}
