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
        Schema::create('value_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id');
            $table->integer('min_value');
            $table->integer('max_value');
            $table->char('char_value');
            $table->integer('weight_value');
            $table->string('predicate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('value_weights');
    }
};
