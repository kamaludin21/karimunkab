<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IpkdDoc extends Model
{
  protected $fillable = [
    'ipkd_year_id',
    'order_in_year',
    'title',
    'slug',
    'file',
    'published_at',
    'determined_at',
  ];

  protected $casts = [
    'published_at'  => 'date',
    'determined_at' => 'date',
  ];

  protected static function booted()
  {
    static::creating(function ($doc) {
      if ($doc->order_in_year === null && $doc->ipkd_year_id) {
        $maxOrder = self::where('ipkd_year_id', $doc->ipkd_year_id)->max('order_in_year') ?? 0;
        $doc->order_in_year = $maxOrder + 1;
      }
    });
  }

  public function getSizeAttribute()
  {
    try {
      // cek di storage/public
      if (Storage::disk('public')->exists($this->file)) {
        $bytes = Storage::disk('public')->size($this->file);
      } else {
        // fallback ke public_path
        $bytes = File::size(public_path($this->file));
      }

      return $this->formatSizeUnits($bytes);
    } catch (\Exception $e) {
      return null; // atau bisa return 'Tidak ditemukan'
    }
  }

  private function formatSizeUnits($bytes)
  {
    if ($bytes >= 1073741824) {
      return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
      return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
      return number_format($bytes / 1024, 2) . ' KB';
    } else {
      return $bytes . ' bytes';
    }
  }

  public function year()
  {
    return $this->belongsTo(IpkdYear::class, 'ipkd_year_id');
  }
}
