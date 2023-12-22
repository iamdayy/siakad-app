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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('nidn')->unique();
            $table->string('full_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('born_place');
            $table->date('born_date');
            $table->text('address');
            $table->string('city');
            $table->string('phone');
            $table->foreignId('study_program_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
