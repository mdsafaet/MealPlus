<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerProfileRequest extends FormRequest
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
              'cus_name' => 'required|string|max:100',

            'cus_add' => 'required|string|max:100',

            'cus_city' => 'required|string|max:100',

            'cus_state' => 'required|string|max:100',

            'cus_postcode' => 'required|string|max:100',

            'cus_phone' => 'required|string|max:100',

            'cus_email' => 'required|email|max:100',

            'ship_name' => 'required|string|max:100',

            'ship_add' => 'required|string|max:100',

            'ship_city' => 'required|string|max:100',

            'ship_state' => 'required|string|max:100',

            'ship_postcode' => 'required|string|max:100',

            'ship_phone' => 'required|string|max:100',

            'ship_email' => 'required|email|max:100',

            'user_id' => 'required|exists:users,id|unique:customer_profiles,user_id,' . $this->customerProfile?->id,
        ];
    }
}
