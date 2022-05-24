<?php
//Jose Alejandro Sanchez
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData["title"] = __('cart.title.cart');
        $viewData["subtitle"] = __('sub.cart');
        $viewData["total"] = $total;
        $viewData["disabled"] =  Auth::user()->getBalance() - $total < 0;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get("products");
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $userId = Auth::user()->getAuthIdentifier();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $items = [];
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setTotalPrice($product->getPrice() * $quantity);
                array_push($items, $item);
                $total = $total + ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            if (count($items) > 0) {
                $order->save();
                $order->items()->saveMany($items);
            }
            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();
            $request->session()->forget('products');
            $viewData = [];
            $viewData["title"] = __('cart.title.purchase');
            $viewData["subtitle"] = __('cart.sub.stat');
            $viewData["order"] = $order;
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
