<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;
    public function __construct(ProductService $product)
    {
        $this->products = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product= $this->products->getproduct();
        return view('product.list',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->products->createproduct($request->all());
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = $this->products->getproductById($product);
        return view('product.edit',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->products->updateproduct($product,$request->all());
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->products->deleteproduct($product);
        return redirect('/product');
    }
}
