<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'user_id',
    'news_category_id',
    'title',
    'slug',
    'images',
    'content',
    'published_at',
  ];

  protected $casts = [
    'published_at' => 'date',
    'images' => 'array',
  ];

  // Relasi ke kategori berita
  public function category(): BelongsTo
  {
    return $this->belongsTo(NewsCategory::class, 'news_category_id');
  }

  // Relasi ke penulis (user)
  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getImageUrlAttribute()
  {
    return asset('storage/' . ($this->images[0] ?? 'img/default.jpg'));
  }
}
