<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        //to Create
        if ($this->isMethod('post')) {
            return $this->rulesForCreate();
        }

        //to Update
        if ($this->isMethod('put')) {
            return $this->rulesForUpdate();
        }

        //to Delete
        return [];
    }

    public function rulesForCreate(): array
    {
        return [
            'event_name' => 'required|string|max:255',
            'event_date_start' => 'required|date',
            'event_date_end' => 'nullable|date',
            'event_description' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|file|max:2048',
        ];
    }

    public function rulesForUpdate(): array
    {
        return [
            'event_name' => 'sometimes|required|string|max:255',
            'event_date_start' => 'sometimes|required|date',
            'event_date_end' => 'sometimes|date',
            'event_description' => 'sometimes|string',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|file|max:2048',
        ];
    }

    public function messages(): array
{
    return [
        'photos.*.max' => 'Each photo must not exceed 2MB.',
    ];
}
}
