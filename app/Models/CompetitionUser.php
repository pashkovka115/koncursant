<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionUser extends Model
{
    use HasFactory;


    protected $table = 'сompetition_users';
    protected $fillable = [
        'bid_id',
        'first_name',
        'last_name',
        'quantity_person_diploma'
    ];
}
