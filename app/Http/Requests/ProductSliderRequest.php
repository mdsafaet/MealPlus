<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSliderRequest extends FormRequest
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
      'title' => 'required|string|max:50',

            'short_des' => 'required|string|max:300',

            'price' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'product_id' => 'required|exists:products,id|unique:product_sliders,product_id,' . $this->route('product_slider'),
        ];
    }
}
