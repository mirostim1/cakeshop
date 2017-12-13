<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //
    public function index() {

        //
        return view('orders.index');
    }

    public function store(CreateOrderRequest $request)
    {

        //
        $lastOrderNr = Order::orderBy('order_id', 'desc')->first();

        if($lastOrderNr == null || $lastOrderNr == '') {
            $orderId = 0;
        } else {
            $orderId = $lastOrderNr->order_id;
        }

        $orderId++;

        foreach (Cart::content() as $cartRow) {
            $data = [
                'order_id' => $orderId,
                'user_id' => Auth::user()->id,
                'product_id' => $cartRow->id,
                'qty' => $cartRow->qty,
                'price' => $cartRow->price,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country
            ];

            Order::create($data);
        }

        Cart::destroy();

        return view('orders.placed');
    }
}
