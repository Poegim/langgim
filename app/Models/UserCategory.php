<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryable(): MorphTo
    {
        return $this->morphTo();
    }
}
