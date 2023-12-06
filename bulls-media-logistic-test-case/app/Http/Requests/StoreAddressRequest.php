<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'country' => 'required|string|min:3|max:64',
            'state' => 'required|string|min:3|max:64',
            'city' => 'required|string|min:2|max:64',
            'street' => 'required|string|min:3|max:64',
            'house' => 'required|string|min:1|max:24',
            'postal_code' => 'required|string|min:3|max:24',
        ];
    }
}
