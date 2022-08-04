<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Error as ErrorModel;

trait HasErrors
{
    public function errors(): MorphMany
    {
        return $this->morphMany(ErrorModel::class, 'errorable');
    }
}
