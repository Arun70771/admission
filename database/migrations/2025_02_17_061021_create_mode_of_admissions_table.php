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
        if (!Schema::hasTable('mode_of_admissions')) {
            Schema::create('mode_of_admissions', function (Blueprint $table) {
                $table->id();
                $table->string('programme');
                $table->string('mode_of_admission');
                $table->string('application_id');
                $table->unsignedBigInteger('programme_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mode_of_admissions');
    }
};
