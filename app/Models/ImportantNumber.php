<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantNumber extends Model
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

  protected $fillable = [
    'order',
    'service_name',
    'contact_name',
    'phone_number',
    'is_whatsapp',
  ];

  protected $casts = [
    'is_whatsapp' => 'boolean',
  ];
}
