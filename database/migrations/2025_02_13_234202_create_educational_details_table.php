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
        Schema::create('educational_details', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');
            $table->string('degree');
            $table->string('university');
            $table->date('joining_date');
            $table->date('completion_date')->nullable();
            $table->string('grades')->nullable();
            $table->timestamps();

            $table->foreign('application_id')->references('application_id')->on('application_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_details');
    }
};
