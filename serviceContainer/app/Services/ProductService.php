<?php 
namespace App\Services;

use App\Models\Product;

class ProductService
{
    // Get the all data from products table 

    public function getproduct(){
        return product::get();
    }

    // Get the unique data from products table

    public function getproductById($id){
        return product::find($id)->first();
    }

    // Add new product in products table

    public function createproduct(array $data)
    {
        return product::create($data);
       
    }

    // updata product details

    public function updateproduct(product $product, array $data)
    {
        $product->update($data);
    }
    
    // delete product from products table 
    
    public function deleteproduct(product $product)
    {
        $product->delete();
    }
}
