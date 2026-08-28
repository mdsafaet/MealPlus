<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'title' => 'required|string|max:200',

            'short_des' => 'required|string|max:300',

            'price' => 'required|string',

            'discount' => 'required|boolean',

            'discount_price' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'stock' => 'required|boolean',

            'star' => 'required|numeric',

            'remark' => 'required|in:new,popular,trending,top,special,regular',

            'category_id' => 'required|exists:categories,id',

            'brand_id' => 'required|exists:brands,id',

        ];
    }
}