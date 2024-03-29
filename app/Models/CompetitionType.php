<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CompetitionType extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'competition_types';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'type',
        'conditions',
        'email_description',
        'reward',
        'rank',
        'nominations',
        'diploma',
        'cost',
    ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    // Конкурсы
    public function competitions()
    {
        return $this->hasMany(Competition::class, 'competition_type_id');
    }
}
