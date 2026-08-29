<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            
            'total' => 'required|string',

            'vat' => 'required|string',

            'payable' => 'required|string',

            'cus_details' => 'required|string',

            'ship_details' => 'required|string',

            'transaction_id' => 'required|string',

            'val_id' => 'required|string',

            'delivery_status' => 'required|in:pending,processing,completed',

            'payment_status' => 'required|string',

            'user_id' => 'required|exists:users,id',
        ];
    }
}
