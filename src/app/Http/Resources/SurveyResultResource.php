<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Resources;

use AidynMakhataev\LaravelSurveyJs\app\Http\Resources\SurveyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        =>  $this->id,
            'json'      =>  $this->json,
            'survey'    =>  new SurveyResource($this->survey)
        ];
    }
}
