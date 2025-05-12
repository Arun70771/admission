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
        Schema::create('step_status', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');            
            $table->boolean('application_form')->default(false); // Default is not completed
            $table->boolean('programme_course')->default(false);
            $table->boolean('mode_admission')->default(false);
            $table->boolean('educational_details')->default(false);
            $table->boolean('upload_documents')->default(false); // Fixed typo
            $table->boolean('preview_finalsubmit')->default(false);
            $table->boolean('pay_fee')->default(false);
            $table->timestamps(); // Add timestamps for created_at and updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_status');
    }
};
