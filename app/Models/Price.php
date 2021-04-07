<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;


    protected $table = 'prices';
    public $timestamps = false;
    protected $fillable = [
        'thanks_teacher',
        'diploma',
        'diploma_kollective_electro',
        'diploma_print_solist',
        'diploma_print_kollective',
        'general_diplom_print',
        'discount',
        'cnt_person',
        'max_quantity_participants_price',
    ];
}
