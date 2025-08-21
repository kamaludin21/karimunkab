<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
}
