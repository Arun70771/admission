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
        Schema::create('payment_response', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_complete')->default(false); // To indicate payment status
            $table->string('payment'); // Payment mode or details
            $table->string('tracking_id')->nullable(); // For payment tracking
            $table->text('payment_response')->nullable(); // Full payment response data
            $table->unsignedBigInteger('application_id'); // Foreign key for application
            $table->timestamps(); // Created at and updated at
            
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_response');
    }
};
