<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailRequest;
use App\Models\ProductDetail;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductDetailController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $productDetails = ProductDetail::latest()->get();
          return $this->success($productDetails,'Product details fetched successfully');
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
    public function store(ProductDetailRequest  $request)
    {
         $data = $request->validated();
         
         foreach(['img1','img2','img3','img4'] as $image){

        if($request->hasFile($image)){

            $data[$image] = $request
                ->file($image)
                ->store('products/details','public');

        }
    }


         $productDetail = ProductDetail::create($data);
         return $this->success($productDetail,'Product detail created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        return $this->success($productDetail,'Product detail fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductDetailRequest $request, ProductDetail $productDetail)
    {
        $data = $request->validated();
         
         foreach(['img1','img2','img3','img4'] as $image){

        if($request->hasFile($image)){

            $data[$image] = $request
                ->file($image)
                ->store('products/details','public');

        }
         }

         $productDetail->update($data);
         return $this->success($productDetail,'Product detail updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDetail $productDetail)
    {
           
      foreach (['img1','img2','img3','img4'] as $image) {

        if ($productDetail->$image) {

            Storage::disk('public')
                ->delete($productDetail->$image);

        }

    }
     
        $productDetail->delete();
        return $this->success($productDetail,'Product detail deleted successfully');
    }
}
