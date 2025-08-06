<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'slug',
    'content',
    'thumbnail',
    'files',
    'published_at'
  ];

  protected $casts = [
    'published_at' => 'date',
    'files' => 'array',
  ];
}
