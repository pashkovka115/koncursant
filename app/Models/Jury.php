<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Jury extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'jury';
    protected $fillable = [
        'name',
        'slug',
        'direction',
        'profession',
        'img',
        'description',
        'ducation',
        'geography_of_work',
        'created_at',
        'updated_at',
        'active',
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
}
