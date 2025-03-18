<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'description' => 'required|max:1000|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'tag_id' => 'required|exists:tags,id',
            'price' => 'required|numeric|min:2',
            'status' => 'required|in:0,1',
            'marketable' => 'required|in:0,1',
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'file' => 'file|mimes:png,jpg,jpeg,pdf,txt,doc,docx,zip,rar'
        ];
    }
}
