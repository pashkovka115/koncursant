<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;


    protected $table = 'appraisals';
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];


    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
