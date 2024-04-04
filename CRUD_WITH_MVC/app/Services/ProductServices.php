<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductServices{
    public $product;

    public function __construct(Product $product)
    {
         $this->product=$product;
    }

    public function getProducts(){
        return $this->product->get();
    }
    public function getProduct($id){
        return $this->product->where('category_id', $id)->get();
    }

    public function getProductshow($id){
        return $this->product->find($id);
    }

    public function addProduct(object $data){
 
            $this->product->name = $data->name;
            $this->product->category_id = $data->category_id;
            $this->product->newprice = $data->newprice;
            $this->product->oldprice = $data->oldprice;
            $this->product->description = $data->description;
            $this->product->quantity = $data->quantity;
            if (isset($data->image)) {
                $image = $data->image;
                $imagename = time() . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/product', $imagename);
                $this->product->image = $imagename;
            };
            $this->product->trend=$data->trend;
            $this->product->save();
            return $this->product;
     
    }

}