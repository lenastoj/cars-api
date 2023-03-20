<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand' => 'string|min:2',
            'model' => 'string|min:2',
            'year' => 'integer|min:1990|max:2023',
            'max_speed' => 'integer|min:20|max:300',
            'is_automatic' => 'boolean',
            'engine' => 'string',
            'number_of_doors' => 'integer|min:2|max:5',
        ];
    }
}
