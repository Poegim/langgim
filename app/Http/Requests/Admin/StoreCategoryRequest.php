<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|max:75|min:3',
            'priority' => 'required|min:0|max:5|numeric',
        ];

        foreach(config('langgim.allowed_languages') as $language)
        {
            $rules[$language] = 'required|unique:categories,'.$language.'|max:75|min:3';
        }

        return $rules;
    }
}
