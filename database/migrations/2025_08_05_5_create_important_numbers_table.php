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
    Schema::create('important_numbers', function (Blueprint $table) {
      $table->id();
      $table->string('service_name');      // nama layanan
      $table->string('contact_name');      // nama orang atau instansi
      $table->string('phone_number');      // nomor telp
      $table->boolean('is_whatsapp')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('important_numbers');
  }
};
