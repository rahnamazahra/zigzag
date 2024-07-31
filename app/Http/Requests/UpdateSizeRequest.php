<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'measurement'   => ['required', 'array'],
            'measurement.*' => ['nullable'],
        ];
    }

    protected function prepareForValidation()
    {
        $measurements = $this->input('measurement', []);

        foreach ($measurements as $key => $value) {
            $measurements[$key] = convertPersianToEnglishNumbers($value);
        }

        $this->merge([
            'measurement' => $measurements,
        ]);
    }
}
