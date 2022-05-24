<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyApi extends Controller
{
    public function index()
    {
        $collection= Http::get("https://api.currencyapi.com/v3/latest?apikey=8EE8S6akBtCDda4aPPh2GM0f3mk6RRqgAW6pmjwM");
        return view('/currency/currency', ['collection'=>$collection['data']]);
    }
}
