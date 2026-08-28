<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCartRequest;
use App\Models\ProductCart;
use App\Traits\ApiResponseTrait;


class ProductCartController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCarts = ProductCart::latest()->get();
        return $this->success($productCarts,'Product carts fetched successfully');
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
    public function store(ProductCartRequest $request)
    {
        $data = $request->validated();
        $productCart = ProductCart::create($data);
        return $this->success($productCart,'Product cart created successfully',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCart $productCart)
    {
        return $this->success($productCart,'Product cart fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCart $productCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCartRequest  $request, ProductCart $productCart)
    {
        $data = $request->validated();
        $productCart->update($data);
        return $this->success($productCart,'Product cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCart $productCart)
    {
        $productCart->delete();
        return $this->success(null,'Product cart deleted successfully');
    }
}
