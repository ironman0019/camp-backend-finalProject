<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body'      => ['required', 'string', 'filled', 'max:1500'],
            'parent_id' => ['required', 'numeric', 'exists:tickets,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
