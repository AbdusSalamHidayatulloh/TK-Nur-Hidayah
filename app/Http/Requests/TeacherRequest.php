<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Check apakah kedua duanya adalah admin atau teacher
        return Auth::check() && in_array(Auth::user()->role, ['admin', 'teacher']);
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return $this->rulesForCreate();
        }

        if ($this->isMethod('put')) {
            return $this->rulesForUpdate();
        }

        return [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rulesForUpdate(): array
    {
        $userId = $this->route('teacher') ?? $this->route('userId');

        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $userId,
            'password' => 'nullable|string|min:6',
            'position' => 'sometimes|string|max:255',
            'birthdate' => 'sometimes|date',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function rulesForCreate(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'position' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
