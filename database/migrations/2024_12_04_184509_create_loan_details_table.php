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
        Schema::create('loan_details', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('clientid')->primary();
            $table->unsignedBigInteger('num_of_payment')->nullable();
            $table->date('first_payment_date')->nullable();
            $table->date('last_payment_date')->nullable();
            $table->float('loan_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_details');
    }
};
