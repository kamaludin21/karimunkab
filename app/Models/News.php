<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

  // Relasi ke Tag
  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(Tag::class);
  }

  public function getImageUrlAttribute()
  {
    $firstImage = $this->images[0]['file_images'] ?? null;
    return asset('storage/' . ($firstImage ?: 'img/default.jpg'));
  }
}
