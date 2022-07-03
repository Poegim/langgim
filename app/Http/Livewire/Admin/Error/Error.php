<?php

namespace App\Http\Livewire\Admin\Error;

use Livewire\Component;
use App\Models\Error as ErrorModel;

class Error extends Component
{
    public $errorModel;
    public $deleteModalVisibility = false;
    public $viewModalVisibility= false;


    public $errorModelId;
    public $title;
    public $description;
    public $user;
    public $status;
    public $date;


    public function showDeleteModal($errorModelId): void
    {
        $this->resetErrorBag();
        $this->errorModelId = $errorModelId;
        $this->deleteModalVisibility = true;
    }

    public function showViewModal($errorModelId): void
    {
        $this->resetErrorBag();
        $this->errorModelId = $errorModelId;
        $this-> errorModel = ErrorModel::findOrfail($this->errorModelId);
        $this->id = $this->errorModel->errorModelId;
        $this->title = $this->errorModel->title;
        $this->description = $this->errorModel->description;
        $this->user = $this->errorModel->user;
        $this->status = $this->errorModel->status;
        $this->date = $this->errorModel->date;
        $this->viewModalVisibility = true;
    }

    public function updateModel()
    {
        //
    }

    public function destroyModel()
    {
        ErrorModel::findOrfail($this->errorModelId)->delete();
        session()->flash('flash.banner', 'Error removed!');
        session()->flash('flash.bannerStyle', 'success');
        $this->deleteModalVisibility = false;
    }


    public function render()
    {
        $errors = ErrorModel::all();
        return view('livewire.admin.error.error', [
            'errorsCollection' => $errors,
        ]);
    }
}
