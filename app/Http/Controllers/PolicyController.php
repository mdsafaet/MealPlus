<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyRequest;
use App\Models\Policy;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $policies = Policy::latest()->get();
        return $this->success($policies, 'Policies retrieved successfully', 200);
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
    public function store(PolicyRequest $request)
    {
        $policy = Policy::create($request->validated());
        return $this->success($policy, 'Policy created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        return $this->success($policy, 'Policy retrieved successfully', 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PolicyRequest  $request, Policy $policy)
    {
        $data = $request->validated();
        $policy->update($data);
        return $this->success($policy, 'Policy updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();
        return $this->success(null, 'Policy deleted successfully', 200);
    }
}
