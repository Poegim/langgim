<?php

namespace App\Http\Livewire\Admin\Error;

use Livewire\Component;
use App\Models\Error as ErrorModel;
use App\Models\User;

class Error extends Component
{
    public bool $deleteModalVisibility = false;
    public bool $viewModalVisibility= false;


    public ?ErrorModel $errorModel;
    public ?int $errorModelId;
    public ?string $title;
    public ?string $description;
    public ?User $user;
    public ?bool $status;
    public ?string $date;


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
        $this->errorModel->status = $this->status;
        $this->errorModel->save();
        session()->flash('flash.banner', 'Status updated!');
        session()->flash('flash.bannerStyle', 'success');
        $this->resetVars();
        $this->viewModalVisibility= false;

    }

    public function destroyModel()
    {
        ErrorModel::findOrfail($this->errorModelId)->delete();
        session()->flash('flash.banner', 'Error removed!');
        session()->flash('flash.bannerStyle', 'success');
        $this->resetVars();
        $this->deleteModalVisibility = false;
    }

    public function resetVars(): void
    {
        $this->errorModel = null;
        $this->errorModelId = null;
        $this->title = null;
        $this->description = null;
        $this->user = null;
        $this->status = null;
        $this->date = null;
    }


    public function render()
    {
        $errors = ErrorModel::all();
        return view('livewire.admin.error.error', [
            'errorsCollection' => $errors,
        ]);
    }
}
