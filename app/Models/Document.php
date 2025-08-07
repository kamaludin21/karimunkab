<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
