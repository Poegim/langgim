<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategoryRequest extends FormRequest
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
            'category' => 'required|exists:categories,id',
        ];

        foreach(config('langgim.allowed_languages') as $language)
        {
            $rules[$language] = 'unique:subcategories,'.$language.'|max:75|min:3|nullable';
        }

        return $rules;
    }
}
