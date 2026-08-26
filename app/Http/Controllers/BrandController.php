<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();

        return $this->success($brands, 'Brands fetched successfully');
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
    public function store(BrandRequest  $request)
    {
        $data = $request->validated();


        if ($request->hasFile('brandImg')) {

            $data['brandImg'] = $request
                ->file('brandImg')
                ->store('brands', 'public');
        }



        $brand = Brand::create($data);

        return $this->success($brand, 'Brand created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return $this->success($brand, 'Brand fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(BrandRequest $request, Brand $brand)
{


    $data = $request->validated();


    if ($request->hasFile('brandImg')) {

        if ($brand->brandImg) {
            Storage::disk('public')
                ->delete($brand->brandImg);
        }


        $data['brandImg'] = $request->file('brandImg')->store('brands', 'public');

    }


    $brand->update($data);


    return $this->success($brand,'Brand updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->brandImg) {

        Storage::disk('public')->delete($brand->brandImg);
        }

        $brand->delete();

        return $this->success(null, 'Brand deleted successfully');
    }
}
