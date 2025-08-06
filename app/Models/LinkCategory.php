<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkCategory extends Model
{
  protected $fillable = ['title', 'slug'];

  public function links()
  {
    return $this->hasMany(Link::class, 'link_category_id');
  }
}
