<?php

namespace App\Http\Controllers;

use App\Services\FavouriteServices;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public $favourite;
    public function __construct(FavouriteServices $favourite)
    {
        $this->favourite = $favourite;
    }

    public function index()
    {
        $favourite = $this->favourite->getFavourites();
        return view('shop.cart.fav', compact('favourite'));
    }

    public function store(Request $request)
    {
        $message = $this->favourite->addFavourite($request);
        return response()->json(['message' => $message, 'vel' => $request], 200);
    }

    public function destroy(string $id)
    {
        $message = $this->favourite->deleteFavourite($id);
        return redirect('favourite');
    }
}
