<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerProfileRequest;
use App\Models\CustomerProfile;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerProfiles = CustomerProfile::all();
        return $this->success($customerProfiles, 'Customer Profiles retrieved successfully', 200);
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
    public function store(CustomerProfileRequest $request)
    {
        $data = $request->validated();
        $customerProfile = CustomerProfile::create($data);
        return $this->success($customerProfile, 'Customer Profile created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerProfile $customerProfile)
    {
        return $this->success($customerProfile, 'Customer Profile retrieved successfully', 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerProfile $customerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerProfileRequest  $request, CustomerProfile $customerProfile)
    {
        $data = $request->validated();
        $customerProfile->update($data);
        return $this->success($customerProfile, 'Customer Profile updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerProfile $customerProfile)
    {
        $customerProfile->delete();
        return $this->success(null, 'Customer Profile deleted successfully', 200);
    }
}
