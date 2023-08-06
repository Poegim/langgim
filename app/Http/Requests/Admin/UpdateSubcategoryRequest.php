<?php

namespace App\Http\Requests\Admin;

use App\Models\Subcategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubcategoryRequest extends FormRequest
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
        $subcategoryId = $this->segment(3);
        $subcategory = Subcategory::findOrFail($subcategoryId);

        $rules = [
            'name' => ['required', 'max:75', 'min:3', Rule::unique('subcategories')->ignore($subcategory->id, 'id')],
        ];

        foreach(config('langgim.allowed_languages') as $language)
        {
            $rules[$language] = ['required','max:75', 'min:3', Rule::unique('subcategories', $language)->ignore($subcategory->id, 'id'),];
        }

        return $rules;
    }
}
