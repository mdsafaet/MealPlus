<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SSLCommerzAccountRequest;
use App\Models\SslcommerzAccount;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SslcommerzAccountController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sslcommerzAccounts = SslcommerzAccount::latest()->get();
        return $this->success($sslcommerzAccounts,'SSLCommerz accounts fetched successfully');
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
    public function store(SSLCommerzAccountRequest $request)
    {
        $data = $request->validated();
        $sslcommerzAccount = SslcommerzAccount::create($data);
        return $this->success($sslcommerzAccount,'SSLCommerz account created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SslcommerzAccount $sslcommerzAccount)
    {
        return $this->success($sslcommerzAccount,'SSLCommerz account fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SslcommerzAccount $sslcommerzAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SSLCommerzAccountRequest $request, SslcommerzAccount $sslcommerzAccount)
    {
        $data = $request->validated();
        $sslcommerzAccount->update($data);
        return $this->success($sslcommerzAccount,'SSLCommerz account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SslcommerzAccount $sslcommerzAccount)
    {
        $sslcommerzAccount->delete();
        return $this->success(null,'SSLCommerz account deleted successfully');
    }
}
