<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'country' => 'string|min:3|max:64',
            'state' => 'string|min:3|max:64',
            'city' => 'string|min:2|max:64',
            'street' => 'string|min:3|max:64',
            'house' => 'string|min:1|max:24',
            'postal_code' => 'string|min:3|max:24',
        ];
    }
}
