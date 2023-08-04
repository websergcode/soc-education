<?php

namespace App\Http\Requests\Television;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexTelevisionRequest extends FormRequest
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
            'brand' => ['nullable', 'string', 'max:500'],
            'model' => ['nullable', 'string', 'max:500'],
            'size' => ['nullable', 'integer', 'max:999999999'],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['nullable', 'integer', 'max:999999999'],
            'is_smart' => ['nullable', 'bool'],
        ];
    }
}
