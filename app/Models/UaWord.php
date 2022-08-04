<?php

namespace App\Models;

use App\Http\Traits\HasErrors;
use App\Http\Traits\HasWord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UaWord extends Model
{
    use HasFactory;
    use HasErrors;
    use HasWord;

    protected $guarded = [];

}
