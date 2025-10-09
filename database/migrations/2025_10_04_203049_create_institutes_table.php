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
    Schema::create('institutes', function (Blueprint $table) {
      $table->id();
      $table->string('code', 50)->unique()->comment('Kode sesuai kodefikasi Kemendagri');
      $table->string('name', 300);
      $table->string('slug', 320)->unique();
      $table->string('alias', 50)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('institutes');
  }
};
