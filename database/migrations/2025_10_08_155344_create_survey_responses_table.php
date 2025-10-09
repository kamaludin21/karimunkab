<?php

use App\Models\Survey;
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
    Schema::create('survey_responses', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Survey::class)->constrained()->cascadeOnDelete();
      $table->foreignId('user_id')->nullable()->constrained();
      $table->json('answer');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('survey_responses');
  }
};
