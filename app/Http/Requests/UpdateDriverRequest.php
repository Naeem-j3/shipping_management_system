<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDriverRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'national_id' => [
                'required',
                'numeric',
                Rule::unique('drivers')->ignore($this->driver),
            ],
            'driver_License_number' => [
                'required','string','max:255',
                Rule::unique('drivers')->ignore($this->route('driver')),
            ],
            'phone' => [
                'required','string','max:255',
                Rule::unique('drivers')->ignore($this->route('driver')),
            ],
            'join_date' => 'required|date',
            'status' => 'nullable|string|max:255',
        ];
    }
}
