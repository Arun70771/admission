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
        Schema::table('application_forms', function (Blueprint $table) {
            // Personal Details
            $table->string('candidate_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            // Contact Details - Correspondence Address
            $table->string('correspondence_house')->nullable();
            $table->string('correspondence_city')->nullable();
            $table->string('correspondence_district')->nullable();
            $table->string('correspondence_country')->nullable();
            $table->string('correspondence_state')->nullable();
            $table->string('correspondence_zip')->nullable();

            // Contact Details - Permanent Address
            $table->string('permanent_house')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_country')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('permanent_zip')->nullable();

            // Remove old columns
            $table->dropColumn(['programme', 'course', 'mode_of_admission']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
             // Re-add removed columns
             $table->string('programme')->nullable();
             $table->string('course')->nullable();
             $table->string('mode_of_admission')->nullable();
 
             // Drop newly added columns
            $table->dropColumn([
                'candidate_name',
                'father_name',
                'mother_name',
                'guardian_name',
                'dob',
                'gender',
                'nationality',
                'email',
                'mobile',
                'correspondence_house',
                'correspondence_city',
                'correspondence_district',
                'correspondence_country',
                'correspondence_state',
                'correspondence_zip',
                'permanent_house',
                'permanent_city',
                'permanent_district',
                'permanent_country',
                'permanent_state',
                'permanent_zip',
            ]);
        });
    }
};
