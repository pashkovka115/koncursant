<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Competition extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'competitions';
    protected $fillable = [
        'name',
        'img',
        'slug',
        'active',
        'description',
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

    // Типы конкурсов
    public function types()
    {
        return $this->belongsToMany(CompetitionType::class);
    }

    // Возрастные категории
    public function ageGroups()
    {
        return $this->belongsToMany(AgeGroup::class);
    }
}
