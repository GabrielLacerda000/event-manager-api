<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'max_participants' => 'nullable|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The event title is required.',
            'title.string' => 'The event title must be a valid text.',
            'title.max' => 'The event title cannot exceed 255 characters.',

            'description.required' => 'The event description is required.',
            'description.string' => 'The event description must be valid text.',

            'city.required' => 'The event city is required.',
            'city.string' => 'The event city must be a valid text.',
            'city.max' => 'The event city name cannot exceed 255 characters.',

            'date.required' => 'The event date is required.',
            'date.date' => 'The event date must be a valid date.',
            'date.after' => 'The event date must be after today.',

            'max_participants.integer' => 'The maximum number of participants must be an integer.',
            'max_participants.min' => 'The maximum number of participants must be at least 1.',
        ];
    }
}
