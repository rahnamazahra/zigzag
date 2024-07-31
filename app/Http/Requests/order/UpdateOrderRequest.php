<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'cloth_id'    => ['required', 'exists:clothes,id'],
            'price'       => ['nullable', 'integer', 'min:0'],
            'quantity'    => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price'       => convertPersianToEnglishNumbers($this->order_number),
            'quantity'    => convertPersianToEnglishNumbers($this->quantity),
            'description' => convertArabicToPersianLetters($this->description),
        ]);
    }
}
