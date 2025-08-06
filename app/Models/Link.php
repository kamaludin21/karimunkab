<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
  protected $fillable = ['link_category_id', 'order', 'url', 'description', 'is_external', 'thumbnail'];

  public static function booted()
  {
    static::creating(function ($partner) {
      if ($partner->order === null) {
        $maxOrder = self::max('order') ?? 0;
        $partner->order = $maxOrder + 1;
      }
    });
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(LinkCategory::class, 'link_category_id');
  }
}
