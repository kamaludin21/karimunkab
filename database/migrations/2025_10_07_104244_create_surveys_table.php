<?php

use App\Models\Institute;
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
    Schema::create('surveys', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Institute::class)->constrained()->cascadeOnUpdate();
      $table->string('title');
      $table->string('slug');
      $table->string('token')->unique();
      $table->string('unique_token')->nullable();
      $table->boolean('is_active')->default(false);
      $table->timestamp('expires_at')->nullable();
      $table->json('questions');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('surveys');
  }
};
