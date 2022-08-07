<?php

namespace App\Models;

use App\Http\Traits\HasWord;
use App\Http\Traits\HasErrors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RuWord extends Model
{
    use HasFactory;
    use HasErrors;
    use HasWord;

    protected $guarded = [];
}
