<?php

namespace App\Http\Requests\customer;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:255'],
            'mobile'        => ['required', 'string', 'max:11', 'unique:'.User::class],
            'national_code' => ['nullable', 'string', 'max:11', 'unique:'.User::class],
            'postal_code'   => ['nullable', 'string', 'max:11', 'unique:'.User::class],
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
