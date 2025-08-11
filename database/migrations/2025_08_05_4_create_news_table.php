<?php

use App\Models\NewsCategory;
use App\Models\User;
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
    Schema::create('news', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(User::class)
        ->constrained()
        ->onDelete('cascade');
      $table->foreignIdFor(NewsCategory::class)
        ->constrained()
        ->onDelete('cascade');
      $table->string('title');
      $table->string('slug')->unique();
      $table->json('images')->nullable();
      $table->longText('content');
      $table->date('published_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('news');
  }
};
