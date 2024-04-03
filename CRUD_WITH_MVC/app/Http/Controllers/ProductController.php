<?php

namespace App\Http\Controllers;

use App\Services\CategoryServices;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $product;
    public $category;

    public function __construct(ProductServices $productService, CategoryServices $categoryServices)
    {
        $this->product = $productService;
        $this->category = $categoryServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->getProducts();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->getCategories();
        return view('shop.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->product->addProduct($request);
        return redirect('product');
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
        //
    }

    public function showProduct($id)
    {
        $products = $this->product->getProduct($id);
        return $products;
    }
}
