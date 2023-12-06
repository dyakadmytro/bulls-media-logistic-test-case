<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            'width' => 'regex:/^\d+(\.\d{1,2})?$/',
            'height' => 'regex:/^\d+(\.\d{1,2})?$/',
            'length' => 'regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'string|min:3|max:64',
            'description' => 'string|min:3|max:255',
            'width_unit' => 'exists:units,name',
            'height_unit' => 'exists:units,name',
            'length_unit' => 'exists:units,name',
            'weight_unit' => 'exists:units,name',
        ];
    }
}
