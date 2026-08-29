<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Models\InvoiceProduct;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class InvoiceProductController extends Controller
{
     use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoiceProducts = InvoiceProduct::latest()->get();
        return $this->success($invoiceProducts,'Invoice products fetched successfully');
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
    public function store(InvoiceProductRequest $request)
    {
        $data = $request->validated();
        $invoiceProduct = InvoiceProduct::create($data);
        return $this->success($invoiceProduct,'Invoice product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceProduct $invoiceProduct)
    {
        return $this->success($invoiceProduct,'Invoice product fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceProduct $invoiceProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceProductRequest  $request, InvoiceProduct $invoiceProduct)
    {
        $data = $request->validated();
        $invoiceProduct->update($data);
        return $this->success($invoiceProduct,'Invoice product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceProduct $invoiceProduct)
    {
        $invoiceProduct->delete();
        return $this->success(null,'Invoice product deleted successfully');
    }
}
