<?php

namespace App\Http\Requests\customer;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

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

        ];
    }
}
