<?php

namespace App\Http\Requests\Admin\Coupan;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCoupanRequest extends FormRequest
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
            'code' => 'required|max:120|min:2|regex:/^[a-zA-Z0-9\., ]+$/u',
            'amount_type' => 'required|in:0,1',
            'amount' => [
                'required',
                'numeric',
                Rule::when($this->input('amount_type') == 0, ['min:1', 'max:99'])
            ],
            'discount_ceiling' => 'required_if:amount_type,0|nullable|numeric',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'status' => 'required|in:0,1'
        ];
    }
}
