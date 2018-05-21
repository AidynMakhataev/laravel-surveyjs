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
        'name', 'slug', 'elements', 'questionTitleLocation', 'title', 'description', 'navigationButtonsVisibility', 'questionsOrder', 'maxTimeToFinish', 'visible', 'visibleIf'
    ];
    protected $casts = [
        'elements'          =>  'array',
        'maxTimeToFinish'   =>  'integer',
        'visible'           =>  'boolean'
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