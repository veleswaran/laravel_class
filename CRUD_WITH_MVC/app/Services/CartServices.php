<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Cart;

class CartServices
{

    public $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCategories()
    {
        return $this->cart->get();
    }

    public function getCart($id)
    {
        return $this->cart->find($id);
    }

    public function addCart(object $data)
    {
        $this->cart->product_id = $data->pid;
        $this->cart->user_id = $data->userid;
        $this->cart->product_qty = $data->product_qty;
        $this->cart->save();
        return "cart Added Successfully";
      
    }

    public function deleteCart($id)
    {
        $cate = $this->cart->find($id);
        $cate->delete();
    }
}
