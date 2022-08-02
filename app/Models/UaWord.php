<?php

namespace App\Models;

use App\Models\Error as ErrorModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UaWord extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function errors()
    {
        return $this->morphMany(ErrorModel::class, 'errorable');
    }

}
