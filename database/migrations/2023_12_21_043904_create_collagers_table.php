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
        Schema::create('collagers', function (Blueprint $table) {
            $table->id();
            $table->integer('gen_year')->nullable()->default(date('Y'));
            $table->char('phase');
            $table->foreignId('study_program_id')->nullable();
            $table->foreignId('entrance_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->date('enter_date');
            $table->integer('nim')->unique();
            $table->bigInteger('nik')->unique();
            $table->integer('nisn')->unique();
            $table->string('full_name');
            $table->integer('semester')->nullable()->default(1);
            $table->enum('gender', ['male', 'female']);
            $table->string('religion');
            $table->string('born_place');
            $table->date('born_date');
            $table->text('address');
            $table->text('ward');
            $table->string('city');
            $table->string('phone');
            $table->bigInteger('dad_nik')->unique();
            $table->string('dad_name');
            $table->bigInteger('mom_nik')->unique();
            $table->string('mom_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collagers');
    }
};
