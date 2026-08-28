<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductReviewRequest;
use App\Models\ProductReview;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
      use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productReviews = ProductReview::latest()->get();
        return $this->success($productReviews,'Product reviews fetched successfully');
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
    public function store(ProductReviewRequest$request)
    {
        //  dd($request->validated());
        $data = $request->validated();
        $productReview = ProductReview::create($data);
        return $this->success($productReview,'Product review created successfully',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductReview $productReview)
    {
        return $this->success($productReview,'Product review fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductReviewRequest  $request, ProductReview $productReview)
    {
         $data = $request->validated();
         $productReview->update($data);
        return $this->success($productReview,'Product review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductReview $productReview)
    {
         $productReview->delete();
        return $this->success(null,'Product review deleted successfully');
    }
}
