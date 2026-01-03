<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'total_price' => ['required', 'integer'],
            'status' => ['required', 'string', 'max:50'],
        ];
    }
    public function prepareForValidation()
{
    $this->merge([
        'user_id' => Auth::id(), // Automatski dodaj user_id
    ]);
}
}
