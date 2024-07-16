<?php

namespace App\Http\Requests\order;

use App\Enums\OrderStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'cloth_id'    => ['required', 'exists:clothes,id'],
            'price'       => ['required', 'integer', 'min:0'],
            'quantity'    => ['nullable', 'integer', 'min:1'],
        ];
    }
}
