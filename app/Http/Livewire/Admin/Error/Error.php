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
    public ?string $message;
    public ?User $user;
    public ?bool $status;
    public ?string $date;
    public $errorable;
    public ?string $language;

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
        $this->errorModel = ErrorModel::findOrfail($this->errorModelId);
        $this->title = $this->errorModel->title;
        $this->message = $this->errorModel->message;
        $this->user = $this->errorModel->user;
        $this->status = $this->errorModel->status;
        $this->date = $this->errorModel->created_at;
        $this->language = $this->errorModel->language;
        $this->viewModalVisibility = true;

    }

    public function updateModel()
    {
        $this->viewModalVisibility= false;
        $this->errorModel->status = $this->status;
        $this->errorModel->save();
        $this->resetVars();

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
        $this->message = null;
        $this->user = null;
        $this->status = null;
        $this->date = null;
    }


    public function render()
    {
        $errors =
            ErrorModel::orderBy('status', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('livewire.admin.error.error', [
            'errorsCollection' => $errors,
        ]);
    }
}
