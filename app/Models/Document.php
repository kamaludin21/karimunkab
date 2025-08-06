<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'slug',
    'file',
    'published_at'
  ];

  protected $casts = [
    'published_at' => 'date',
  ];
}
