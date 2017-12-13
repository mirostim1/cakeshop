<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = $request->id;
        $name = $request->name;
        $qty = $request->qty;
        $price = $request->price;
        $options = ['photo' => $request->photo, 'slug' => $request->slug];

        Cart::add($id, $name, $qty, $price, $options);

        return view('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request->all();
        /*
        $rowId = $id;

        Cart::update($rowId, $request->qty);

        return view('cart.index');
        */
    }

    public function updateCart(Request $request) {

        //
        //return $request->delete;

        if(isset($request->delete)) {
            Cart::remove($request->delete);
            return redirect()->back();
        }

        for($i = 0; $i < count($request->qtyArray); $i++) {

            Cart::update($request->rowId[$i], $request->qtyArray[$i]);
        }

        return redirect()->back();
    }
}
