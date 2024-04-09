<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartServices
{


    public $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCarts()
    {

        $cart = Cart::where('user_id', Auth::id())->get();
        return $cart;
    }

    public function getCart($id)
    {
        return $this->cart->find($id);
    }

    public function addCart(object $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $product_id = $data['pid'];
            $product_qty = $data['product_qty'];
            $product = Product::find($product_id);

            if ($product) {
                $user_id = Auth::id();
                if (Cart::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
                    return response()->json(['status' => 'Product Already in Cart'], 200);
                } else {
                    if ($product->quantity >= $product_qty) {
                        Cart::create([
                            'user_id' => $user_id,
                            'product_id' => $product_id,
                            'product_qty' => $product_qty
                        ]);
                        return response()->json(['status' => 'Product Added in Cart'], 200);
                    } else {
                        return response()->json(['status' => 'Product Stock Not Available'], 200);
                    }
                }
            }
        } else {
            return response()->json(['status' => 'Login to Add Cart'], 200);
        }
    }

    public function deleteCart($id)
    {
        $cate = $this->cart->find($id);
        $cate->delete();
    }
}
