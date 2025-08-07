<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
