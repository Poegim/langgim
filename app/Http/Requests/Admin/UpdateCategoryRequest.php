<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $categoryId = $this->segment(3);
        $category = Category::findOrFail($categoryId);

        $rules = [
            'name' => ['required', 'max:75', 'min:3', Rule::unique('categories')->ignore($category->id, 'id')],
            'priority' => 'required|min:0|max:5|numeric',
        ];

        foreach(config('langgim.allowed_languages') as $language)
        {
            $rules[$language] = ['required','max:75', 'min:3', Rule::unique('categories', $language)->ignore($category->id, 'id'),];
        }

        return $rules;
    }
}
