<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreErrorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'word_id' => 'required|numeric|exists:words,id',
            'language' => [
                'required',
                Rule::in(config('langgim.allowed_languages')),
            ],
            'title' => 'required|max:35',
            'message' => 'required|max:255',
        ];
    }
}
