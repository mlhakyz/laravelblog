<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'notes' => 'required|string|min:10',
            'hobby' => 'required|in:music,art,video-games',
            'drink' => 'required|in:ice,mocha,tea,coffee',
            'accept' => 'accepted',
        ];
    }
}