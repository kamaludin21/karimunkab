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
    Schema::create('ipkd_docs', function (Blueprint $table) {
      $table->id();
      $table->foreignId('ipkd_year_id')
        ->nullable()
        ->constrained('ipkd_years')
        ->onDelete('cascade');
      $table->unsignedInteger('order_in_year');
      $table->string('title', 300);
      $table->string('slug', 325);
      $table->string('file', 325);
      $table->date('published_at');
      $table->date('determined_at');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('ipkd_docs');
  }
};
