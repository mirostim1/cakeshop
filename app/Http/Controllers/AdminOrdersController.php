<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    //
    public function index()
    {
        //
        $orders = Order::all();

        //return $orders;

        return view('admin.orders.index', compact('orders'));
    }

    //
    public function deleteOrders(Request $request)
    {
        //
        $orders = Order::findOrFail($request->checkBoxArray);

            foreach ($orders as $order) {
                $order->delete();
            }

            session()->flash('orders_deleted', 'Chosen orders have been deleted');

            return redirect()->back();
    }
}
