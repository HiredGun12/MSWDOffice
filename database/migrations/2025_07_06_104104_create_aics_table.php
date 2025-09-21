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
        Schema::create('aics', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // created_at and updated_at

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();

            $table->string('barangay')->nullable();

            $table->bigInteger('department_function_code');
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('purpose')->nullable();


            $table->date('assistance_date')->nullable();
            $table->time('assistance_time')->nullable();
            $table->dateTime('processed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aics');
    }
};
