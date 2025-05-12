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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian_name')->nullable();
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('email')->unique();
            $table->string('nationality');
            $table->string('country_code');
            $table->string('mobile')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_forms');
    }
};
