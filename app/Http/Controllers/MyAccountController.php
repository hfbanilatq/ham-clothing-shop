<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = __('orders.title.order');
        $viewData["subtitle"] = __('orders.sub.order');
        $viewData["orders"] = Order::with(['items'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }

    public function filterOrder(Request $request)
    {

        $filterInput = $request->input('filter');
        $start_date = Carbon::parse("$filterInput 00:00:00")->format('Y-m-d H:i:s');
        $end_date = Carbon::parse("$filterInput 23:59:59")->format('Y-m-d H:i:s');


        info($start_date);
        info($end_date);
        $viewData = [];
        $viewData["title"] = __('orders.title.order');
        $viewData["subtitle"] = __('orders.sub.order');
        $viewData["orders"] = Order::with(['items'])->whereBetween('created_at', [$start_date , $end_date])->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
