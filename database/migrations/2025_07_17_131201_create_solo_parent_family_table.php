<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solo_parent_family', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solo_parent_id')->constrained('solo_parent')->onDelete('cascade');
            $table->string('name'); // required, cannot be null
            $table->string('relationship'); // required, cannot be null
            $table->integer('age')->nullable(); // optional
            $table->date('birthday')->nullable(); // optional
            $table->string('civil_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('educational')->nullable();
            $table->decimal('monthly', 12, 2)->nullable(); // optional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solo_parent_family');
    }
};
