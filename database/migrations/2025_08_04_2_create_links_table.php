<?php

use App\Models\LinkCategory;
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
    Schema::create('links', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(LinkCategory::class)->nullable()->constrained()->nullOnDelete();
      $table->integer('order');
      $table->string('url');
      $table->string('description')->nullable();
      $table->boolean('is_external')->default(false);
      $table->string('thumbnail')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('links');
  }
};
