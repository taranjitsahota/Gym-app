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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('gender');
            $table->integer('number');
            $table->integer('age');
            $table->string('file');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->integer('is_deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
