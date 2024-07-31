<?php

namespace App\Http\Requests\customer;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $userId = $this->route('customer');

        return [
            'name'          => ['required', 'string', 'max:255'],
            'mobile'        => ['required', 'string', 'max:11', Rule::unique('users')->ignore($userId)],
            'national_code' => ['nullable', 'string', 'max:11', Rule::unique('users')->ignore($userId)],
            'postal_code'   => ['nullable', 'string', 'max:11', Rule::unique('users')->ignore($userId)],
            'address'       => ['nullable', 'string', 'max:255'],
            'location'      => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'mobile'        => convertPersianToEnglishNumbers($this->mobile),
            'national_code' => convertPersianToEnglishNumbers($this->national_code),
            'postal_code'   => convertPersianToEnglishNumbers($this->postal_code),
            'name'          => convertArabicToPersianLetters($this->name),
            'address'       => convertArabicToPersianLetters($this->address),
        ]);
    }
}
