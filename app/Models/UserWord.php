<?php

namespace App\Models;

use App\Http\Traits\HasWord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWord extends Model
{
    use HasFactory;
    use HasWord;
    protected $guarded = [];
}
