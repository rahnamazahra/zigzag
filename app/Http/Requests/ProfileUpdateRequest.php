<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'mobile'   => ['required', 'digits:11', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name'     => convertArabicToPersianLetters($this->name),
            'mobile'   => convertPersianToEnglishNumbers($this->mobile),
            'password' => convertPersianToEnglishNumbers($this->password),
        ]);
    }
}
