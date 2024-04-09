<?php

namespace App\Http\Controllers;

use App\Services\CartServices;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public $cart;
    public function __construct(CartServices $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->cart->getCarts();
        return view('shop.cart.list', ['cart' => $cart]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->cart->addCart($request);
        return response()->json(['message' => 'Success', 'vel' => $request], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cart->deleteCart($id);
        return redirect('cart');
    }
}
