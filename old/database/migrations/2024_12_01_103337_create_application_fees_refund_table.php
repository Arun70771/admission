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
        Schema::create('application_fees_refund', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Column for payment type (e.g., cash, card)
            $table->string('email')->nullable(); // Email
            $table->date('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('program_name')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('amount')->nullable(); // Amount of the fee
            $table->string('reason_of_withdrawal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_fees_refund');
    }
};
