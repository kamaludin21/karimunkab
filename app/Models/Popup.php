<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
  public static function booted()
  {
    static::creating(function ($partner) {
      if ($partner->order === null) {
        $maxOrder = self::max('order') ?? 0;
        $partner->order = $maxOrder + 1;
      }
    });
  }

  protected $fillable = ['order', 'title', 'slug', 'description', 'is_active', 'image'];
}
