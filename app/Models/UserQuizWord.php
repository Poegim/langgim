<?php

namespace App\Models;

use App\Http\Traits\HasWord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizWord extends Model
{
    use HasFactory;
    use HasWord;
    protected $guarded = [];
}
