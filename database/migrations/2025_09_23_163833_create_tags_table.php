<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('tags', function (Blueprint $table) {
      $table->id();
      $table->string('name', length: 30);
      $table->string('slug', length: 35)->unique();
      $table->timestamps();
    });

    // pivot article_tag
    Schema::create('news_tag', function (Blueprint $table) {
      $table->foreignId('news_id')->constrained()->onDelete('cascade');
      $table->foreignId('tag_id')->constrained()->onDelete('cascade');
      $table->primary(['news_id', 'tag_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tags');
    Schema::dropIfExists('news_tag');
  }
};
