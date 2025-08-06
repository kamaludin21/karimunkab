<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantNumber extends Model
{
  protected $fillable = [
    'service_name',
    'contact_name',
    'phone_number',
    'is_whatsapp',
  ];

  protected $casts = [
    'is_whatsapp' => 'boolean',
  ];
}
