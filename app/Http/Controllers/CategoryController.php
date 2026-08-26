<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return $this->success($categories, 'Categories fetched successfully');
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
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();


        if ($request->hasFile('categoryImg')) {

            $data['categoryImg'] = $request->file('categoryImg')->store('categories', 'public');
        }


        $category = Category::create($data);


        return $this->success($category, 'Category created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->success($category, 'Category fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();


        if ($request->hasFile('categoryImg')) {


            if ($category->categoryImg) {

                Storage::disk('public')->delete($category->categoryImg);
            }


            $data['categoryImg'] = $request->file('categoryImg')->store('categories', 'public');
        }


        $category->update($data);


        return $this->success($category, 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->categoryImg) {

            Storage::disk('public')->delete($category->categoryImg);
        }


        $category->delete();


        return $this->success(null, 'Category deleted successfully');
    }
}
