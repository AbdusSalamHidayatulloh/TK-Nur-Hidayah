<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['admin', 'teacher']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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

    public function rulesForCreate(): array
    {
        return [
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|file|max:2048',
            'date_taken' => 'nullable|date',
        ];
    }

    public function rulesForUpdate(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'date_taken' => 'sometimes|date',
            'image_path' => 'nullable|file|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'photos.*.max' => 'Each photo must not exceed 2MB.',
            'image_path.max' => 'The photo must not exceed 2MB.',
        ];
    }
}