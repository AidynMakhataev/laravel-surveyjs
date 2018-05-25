<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model {

    protected $table = 'survey_results';
    protected $fillable = [
        'survey_id', 'user_id', 'ip_address', 'json'
    ];
    protected $casts = [
        'json'  =>  'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey() {
        return $this->belongsTo('AidynMakhataev\LaravelSurveyJs\app\Models\Survey', 'survey_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(config('survey-manager.user_model'), 'user_id');
    }
}