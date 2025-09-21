<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solo_parent', function (Blueprint $table) {
            $table->id();
            $table->integer('case_number');
            $table->string('full_name');
            $table->string('address');
            $table->integer('age');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('occupation');
            $table->string('religion');
            $table->string('educational_attainment');
            $table->string('company_agency')->nullable();
            $table->string('contact_no');
            $table->string('email_address')->nullable();
            $table->string('birth_place');
            $table->date('date_of_birth')->nullable();
            $table->string('monthly_income')->nullable();
            $table->boolean('patawid_beneficiary')->default(false);
            $table->boolean('indigenous_person')->default(false);
            $table->boolean('lgbtq')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solo_parent');
    }
};
