<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'img1' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'img2' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'img3' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'img4' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'des' => 'required|string|max:1000',

            'colour' => 'required|string|max:1000',

            'size' => 'required|string|max:1000',

            'product_id' => 'required|exists:products,id',
        ];
    }
}
