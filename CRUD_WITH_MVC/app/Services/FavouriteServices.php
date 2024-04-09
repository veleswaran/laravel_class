<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavouriteServices
{
    public $favourite;

    public function __construct(Favourite $favourite)
    {
        $this->favourite = $favourite;
    }

    public function getFavourites()
    {
        return $this->favourite->where('user_id', Auth::user()->id)->get();
    }

    public function addFavourite(object $request)
    {

        $data = $request->all();
        $product_id = $data['pid'];
        $product = Product::find($product_id);

        if ($product) {
            $user_id = Auth::id();
            if (Favourite::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
                return "already exist in your favourites";
            } else {
                Favourite::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id
                ]);
                return  'Product Added in Favourite';
            }
        }
    }

    public function deleteFavourite(string $id){
        $favourite = $this->favourite->find($id);
        $favourite->delete();
        return "deleted successfully";
    }
}
