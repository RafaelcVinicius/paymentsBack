<?php

namespace App\Http\Requests\PaymentIntention;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "paymerUuid"    => ['required', 'min:3', 'max:100', 'email'],
            "totalAmount"   => ['required', 'min:3', 'max:100', 'email'],
            "webHook"       => ['required', 'min:3', 'max:100', 'email'],
        ];
    }
}
