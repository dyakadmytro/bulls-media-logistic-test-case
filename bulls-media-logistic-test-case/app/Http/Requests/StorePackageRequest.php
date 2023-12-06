<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'width' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'height' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'length' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'required|string|min:3|max:64',
            'description' => 'required|string|min:3|max:255',
            'width_unit' => 'required|exists:units,name',
            'height_unit' => 'required|exists:units,name',
            'length_unit' => 'required|exists:units,name',
            'weight_unit' => 'required|exists:units,name',
        ];
    }
}
