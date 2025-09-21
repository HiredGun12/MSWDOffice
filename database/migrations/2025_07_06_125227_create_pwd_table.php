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
        Schema::create('pwd', function (Blueprint $table) {
            $table->id();

            //! Personal Information
            $table->string('image')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable(); 
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->date('date_of_birth');
            $table->enum('sex', ['Male', 'Female', 'Other']);
            $table->string('civil_status');

            //! Contact
            $table->string('email_address')->nullable();
            $table->string('mobile_no')->nullable()->default('+63');
            $table->string('landline')->nullable();

            //! Address
            $table->string('house_no_street_name')->nullable();
            $table->string('barangay');
            $table->string('city_municipality');
            $table->string('province');
            $table->string('region');

            //! Disability Info
            $table->string('type_of_disability');
            $table->string('cause_of_disability');

            //! Education & Employment
            $table->string('educational_attainment');
            $table->string('employment_status');
            $table->string('category_of_employment')->nullable();
            $table->string('nature_of_employment')->nullable();
            $table->string('occupation')->nullable();

            //! Other Info
            $table->string('blood_type')->nullable();
            $table->string('organization_affiliated')->nullable(); 
            $table->string('id_reference_no')->nullable();

            //! Family
            $table->string('mothers_first_name');
            $table->string('mothers_middle_name')->nullable();
            $table->string('mothers_last_name');

            $table->string('fathers_first_name');
            $table->string('fathers_middle_name')->nullable(); 
            $table->string('fathers_last_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwd');
    }
};
