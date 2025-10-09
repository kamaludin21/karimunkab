<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
  protected $fillable = [
    'survey_id',
    'respondent_id',
    'answer', // json
  ];

  
}
