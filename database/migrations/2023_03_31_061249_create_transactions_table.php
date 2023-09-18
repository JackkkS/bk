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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->integer('guest_id');
            $table->integer('field_id');
            $table->integer('hour');
            $table->string('status');
            $table->date('checkin');
            $table->time('checkin_time');
            $table->date('checkout');
            $table->time('checkout_time');
            $table->integer('expenses');
            $table->string('payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
