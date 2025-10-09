<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
  protected $fillable = [
    'institute_id', // Author survey
    'title', // Judul survey
    'slug', // slug
    'token',
    'unique_token', // readable token for share
    'is_active',
    'expires_at',
    'questions', // json
  ];
}
