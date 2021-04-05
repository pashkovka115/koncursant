<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelAlias;

class CompetitionTeacher extends ModelAlias
{
    use HasFactory;

    protected $table = 'сompetition_teachers';
    protected $fillable = [
        'bid_id',
        'first_name',
        'last_name',
        'third_name',
    ];
}

