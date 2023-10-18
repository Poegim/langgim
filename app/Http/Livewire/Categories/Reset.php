<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Reset extends Component
{
    public ?int $categoryId = null;
    public ?int $subcategoryId = null;
    public ?Collection $words = null;
    public ?string $language = null;
    public bool $modalVisibility = false;

    public function mount($categoryId = NULL, $subcategoryId = NULL)
    {
        $this->categoryId = $categoryId;
        $this->subcategoryId = $subcategoryId;
        $this->language = auth()->user()->language;
    }

    public function showModal()
    {
        $this->modalVisibility = true;
    }

    public function getUserWords()
    {
        if($this->subcategoryId == NULL)
        {

            $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->where('is_learned', '>', 0)
                    ->where('language', '=', $this->language)
                    ->with('word')
                    ->whereRelation('word', 'category_id', '=', $this->categoryId)
                    ->get();

        } else
        {
            $this->words =
                    auth()
                    ->user()
                    ->userWords()
                    ->where('is_learned', '>', 0)
                    ->where('language', '=', $this->language)
                    ->with('word')
                    ->whereRelation('word', 'category_id', '=', $this->categoryId)
                    ->whereRelation('word', 'subcategory_id', '=', $this->subcategoryId)
                    ->get();
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
