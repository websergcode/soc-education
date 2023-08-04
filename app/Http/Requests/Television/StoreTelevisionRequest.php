<?php

namespace App\Http\Requests\Television;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTelevisionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand' => ['required', 'string', 'max:500'],
            'model' => ['required', 'string', 'max:500'],
            'size' => ['required', 'integer', 'max:999999999'],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'integer', 'max:999999999'],
            'is_smart' => ['nullable', 'bool'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
