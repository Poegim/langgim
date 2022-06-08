<?php

namespace App\Http\Livewire\Admin\Words\AudioFile;

use Livewire\Component;
use Livewire\Redirector;

class Delete extends Component
{
    public $word;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): Redirector
    {

        file_exists($this->word->audio_file) ? unlink($this->word->audio_file) : null;
        $this->word->audio_file = NULL;
        $this->word->save();
        session()->flash('flash.banner', 'Audio file removed!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');

    }

    public function render()
    {
        return view('livewire.admin.words.audio-file.delete');
    }
}
