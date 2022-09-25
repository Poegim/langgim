<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Collection;

class Reset extends Component
{
    public ?Category $category = null;
    public ?Subcategory $subcategory = null;
    public ?Collection $words = null;
    public ?string $language = null;
    public bool $modalVisibility = false;

    public function mount($category = NULL, $subcategory = NULL)
    {
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->language = auth()->user()->language;
    }

    public function showModal()
    {
        $this->modalVisibility = true;
    }

    public function getUserWords()
    {
        if($this->subcategory == NULL)
        {
            switch ($this->language) {
                case 'ukrainian':

                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\UaWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->get();

                    break;

                case 'english':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\EnWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->get();

                    break;

                case 'german':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\GeWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->get();

                    break;

                case 'spanish':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\EsWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->get();

                    break;
            }
        } else
        {
            switch ($this->language) {
                case 'ukrainian':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\UaWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->whereRelation('word', 'subcategory_id', '=', $this->subcategory->id)
                    ->get();
                    break;

                case 'english':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\EnWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->whereRelation('word', 'subcategory_id', '=', $this->subcategory->id)
                    ->get();
                    break;

                case 'german':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\GeWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->whereRelation('word', 'subcategory_id', '=', $this->subcategory->id)
                    ->get();
                    break;

                case 'spanish':
                    $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->with('word')
                    ->where(
                        [
                            'user_id' => auth()->id(),
                            'wordable_type' => 'App\Models\EsWord',

                        ]
                    )->whereRelation('word', 'category_id', '=', $this->category->id)
                    ->whereRelation('word', 'subcategory_id', '=', $this->subcategory->id)
                    ->get();
                    break;
            }
        }

    }

    public function resetProgress()
    {
        $this->getUserWords();
        foreach($this->words as $word)
        {
            $word->delete();
        }

        session()->flash('flash.banner', 'Success!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.categories.reset');
    }
}
