<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
     use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::with(['category','brand'])->latest()->get();
        return $this->success($products,'Products fetched successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('products', 'public');

        }

        $product = Product::create($data);
        return $this->success($product, 'Product created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         return $this->success($product, 'Product fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest  $request, Product $product)
    {


       $data = $request->validated();


        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')
                    ->delete($product->image);
            }
            $data['image'] = $request
                ->file('image')
                ->store('products', 'public');

        }

        $product->update($data);

        return $this->success($product, 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
          if ($product->image) {

            Storage::disk('public')
                ->delete($product->image);

        }


        $product->delete();


        return $this->success(null, 'Product deleted successfully');
    }
    
}
