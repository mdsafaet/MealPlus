<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SSLCommerzAccountRequest extends FormRequest
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
                'store_id' => 'required|string|max:100',

            'store_password' => 'required|string|max:100',

            'currency' => 'required|string|max:100',

            'success_url' => 'required|url|max:200',

            'failed_url' => 'required|url|max:200',

            'cancel_url' => 'required|url|max:200',

            'ipn_url' => 'required|url|max:200',

            'init_url' => 'required|string|max:20',
        ];
    }
}
