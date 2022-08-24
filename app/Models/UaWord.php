<?php

namespace App\Models;

use App\Models\Interfaces\ForeignWordInterface;
use App\Http\Traits\HasWord;
use App\Http\Traits\HasErrors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UaWord extends Model implements ForeignWordInterface
{
    use HasFactory;
    use HasErrors;
    use HasWord;

    protected $guarded = [];

}
