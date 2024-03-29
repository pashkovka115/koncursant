<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Заявки будущих конкурсантов на конкурс
 */

class Bid extends Model
{
    use HasFactory;


    protected $table = 'bids';
    protected $fillable = [
        'type',
        'appraisal',

        'competition_id',
        'nomination_id',
        'age_group_id',
        'tariff_id',

        'processe_state',

        'cnt_people',
        'musical_instrument',
        'musical_number',
        'koll_name',
        'educational_institution',

        'participant_diploma_print',
        'general_diploma_print',
        'cnt_kollective_diploma',
        'cnt_person_diploma',

        'appraisal_id',

        // address
        'country',
        'state',
        'city',
        'street',
        'house',
        'apartment',
        'postcode',
        'email',
        'phone',

        'resource',
        'link_to_resource',
        'comment',
    ];

    public function appraisal()
    {
        return $this->belongsTo(Appraisal::class);
    }


    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function nomination()
    {
        return $this->belongsTo(Nomination::class);
    }

    public function ageGroup()
    {
        return $this->belongsTo(AgeGroup::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function participants()
    {
        return $this->hasMany(CompetitionUser::class);
//        return $this->belongsTo(CompetitionUser::class);
    }

    public function teachers()
    {
        return $this->hasMany(CompetitionTeacher::class);
//        return $this->belongsTo(CompetitionTeacher::class);
    }
}
