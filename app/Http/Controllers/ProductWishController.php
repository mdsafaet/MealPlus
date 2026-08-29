<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductWishRequest;
use App\Models\ProductWish;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProductWishController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productWishes = ProductWish::latest()->get();
        return $this->success($productWishes,'Product wishes fetched successfully');
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
    public function store(ProductWishRequest $request)
    {
        $data = $request->validated();
        $productWish = ProductWish::create($data);
        return $this->success($productWish,'Product wish created successfully',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductWish $productWish)
    {
        return $this->success($productWish,'Product wish fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductWish $productWish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductWishRequest  $request, ProductWish $productWish)
    {
        $data = $request->validated();
        $productWish->update($data);
        return $this->success($productWish,'Product wish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductWish $productWish)
    {
        $productWish->delete();
        return $this->success(null,'Product wish deleted successfully');
    }
}
