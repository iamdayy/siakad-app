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
        Schema::create('campuss_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('app_code')->nullable()->default('SKD_APP');
            $table->string('app_name')->nullable()->default('Siakad APP');
            $table->string('app_title')->nullable()->default('Kampus DIGITAL');
            $table->string('app_url')->nullable()->default('https://siakad-app.com');
            $table->string('no_sk')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('mail')->nullable();
            $table->string('rector_nidn')->nullable();
            $table->string('rector_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('background_login')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campuss_profiles');
    }
};
