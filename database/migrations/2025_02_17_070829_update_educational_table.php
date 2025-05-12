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
        Schema::table('educational_details', function (Blueprint $table) {
            // Remove existing columns
            $table->dropColumn(['degree', 'university', 'joining_date', 'completion_date', 'grades', 'created_at', 'updated_at']);

           // Add new columns
           $table->string('board_10th')->nullable();
           $table->decimal('marks_10th', 5, 2)->nullable(); // Assuming marks are in percentage (e.g., 95.50)
           $table->string('board_12th')->nullable();
           $table->decimal('marks_12th', 5, 2)->nullable();
           $table->string('board_bachelors')->nullable();
           $table->decimal('marks_bachelors', 5, 2)->nullable();
           $table->string('board_masters')->nullable();
           $table->decimal('marks_masters', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educational_details', function (Blueprint $table) {
            // Re-add dropped columns
            $table->string('degree')->nullable();
            $table->string('university')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('grades')->nullable();
            $table->timestamps();

            // Drop new columns
            $table->dropColumn([
                'board_10th', 'marks_10th', 'board_12th', 'marks_12th',
                'board_bachelors', 'marks_bachelors', 'board_masters', 'marks_masters'
            ]);
        });
    }
};
