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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('registration_date');
            $table->date('date_of_birth');
            $table->string('admission_no')->index();
            $table->string('roll_no');
            $table->string('class');
            $table->string('section');
            $table->string('gender');
            $table->string('status');
            $table->string('parents_name');
            $table->string('parents_mobile-num');
            $table->string('secondary_mobile_num');
            $table->string('address');
            $table->timestamps();

            $table->index(['id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
