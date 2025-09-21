<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solo_parent_emergency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solo_parent_id')->constrained('solo_parent')->onDelete('cascade');
            $table->string('name');
            $table->string('relationship');
            $table->string('contact_no');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solo_parent_emergency');
    }
};
