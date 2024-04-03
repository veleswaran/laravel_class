<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductServices{
    public $productModel;

    public function __construct(Product $productModel)
    {
         $this->productModel=$productModel;
    }

    public function getProducts(){
        return $this->productModel->get();
    }
    public function getProduct($id){
        return $this->productModel->get()->where(['category_id'=>$id]);
    }

    public function addProduct(Object $data){
        try {
            $this->productModel->name = $data->name;
            $this->productModel->newprice = $data->newprice;
            $this->productModel->oldprice = $data->oldprice;
            $this->productModel->description = $data->description;
            $this->productModel->quantity = $data->quantity;
            if (isset($data->image)) {
                $image = $data->image;
                $imagename = time() . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/category', $imagename);
                $this->productModel->image = $imagename;
            };
            $this->productModel->trend=$data->trend;
            $this->productModel->save();
            return $this->productModel;
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error occurred while adding category: ' . $e->getMessage());
            return null;
        }
    }

}