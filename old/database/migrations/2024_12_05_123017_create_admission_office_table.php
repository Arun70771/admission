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
        Schema::create('admission_office', function (Blueprint $table) {
            $table->id();
            $table->string('criteria')->nullable();
            $table->string('marks')->nullable();
            $table->boolean('check_level_1')->default(false);
            $table->boolean('check_level_2')->default(false);
            $table->boolean('final_payment')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_office');
    }
};
