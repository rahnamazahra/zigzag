<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymengtRequest extends FormRequest
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
            'order_id'         => ['required'],
            'amount'           => ['required'],
            'transaction_type' => ['required'],
            'payment_type'     => ['nullable'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'amount' => convertPersianToEnglishNumbers($this->amount),
        ]);
    }
}
