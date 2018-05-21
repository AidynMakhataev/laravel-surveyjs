<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'json'
    ];
    protected $casts = [
        'json'  =>  'array'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ]
        ];
    }


    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }
        return $this->name;
    }
}