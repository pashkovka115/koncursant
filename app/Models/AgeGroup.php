<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AgeGroup extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'age_groups';
    protected $fillable = [
        'name',
        'slug',
        'age',
        'price',
        'created_at',
        'updated_at',
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
        return $this->belongsToMany(Competition::class);
    }
}
