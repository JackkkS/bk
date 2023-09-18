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
        Schema::create('fields', function (Blueprint $table) {
            $table->id('field_id');
            $table->string('field_name');
            $table->string('field_type');
            $table->integer('price');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('photo4');
            $table->string('field_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
