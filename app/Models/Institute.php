<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Institute extends Model
{
  protected $fillable = ['code', 'name', 'slug', 'alias',];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
