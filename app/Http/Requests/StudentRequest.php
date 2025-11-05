<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Check apakah kedua duanya adalah admin atau teacher
        return Auth::check() && in_array(Auth::user()->role, ['admin', 'teacher']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rulesForCreate(): array
    {
        return [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function rulesForUpdate(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'birthdate' => 'sometimes|date',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
