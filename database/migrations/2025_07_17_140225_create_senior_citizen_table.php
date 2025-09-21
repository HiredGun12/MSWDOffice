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
        Schema::create('senior_citizen', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('gender')->nullable(); 
            $table->string('age');
            $table->date('birthday');
            $table->string('contact_person');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senior_citizen');
    }
};
