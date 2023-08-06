<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreWordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'word' => ['required', 'max:30'],
            'sample_sentecne' => ['nullable', 'max:256'],
            'category' => ['required',],
            'audio_file' => ['nullable','mimes:mp3','max:2048'],
        ];

        foreach(config('langgim.allowed_languages') as $language)
        {
            $rules[$language] = 'max:30|nullable';
        }

        return $rules;
    }
}
