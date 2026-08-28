<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSliderRequest;
use App\Models\ProductSlider;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductSliderController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $productSliders = ProductSlider::latest()->get();
          return $this->success($productSliders,'Product sliders fetched successfully');
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
    public function store(ProductSliderRequest  $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('products/sliders', 'public');

        }

         $productSlider = ProductSlider::create($data);
         return $this->success($productSlider,'Product slider created successfully',201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSlider $productSlider)
    {
        return $this->success($productSlider,'Product slider fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSlider $productSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductSliderRequest  $request, ProductSlider $productSlider)
    {

  

        $data = $request->validated();

        
  

        if ($request->hasFile('image')) {

        
            if ($productSlider->image) {
                Storage::disk('public')->delete($productSlider->image);
            }

            $data['image'] = $request
                ->file('image')
                ->store('products/sliders', 'public');
        }

         $productSlider->update($data);
    
        return $this->success($productSlider, 'Product slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSlider $productSlider)
    {

       if ($productSlider->image) {

            Storage::disk('public')
                ->delete($productSlider->image);

        }

        $productSlider->delete();
        return $this->success($productSlider, 'Product slider deleted successfully');
        
    }
}
