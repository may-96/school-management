<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('roll_no')->nullable()->change();
            $table->string('class')->nullable()->change();
            $table->string('section')->nullable()->change();
            $table->string('status')->nullable()->default('Inactive')->change(); 
            $table->string('secondary_mobile')->nullable()->change();
            $table->string('profile_image')->nullable()->change();
            $table->text('address')->nullable()->change();

            $table->string('first_name')->nullable(false)->change();
            $table->string('last_name')->nullable(false)->change();
            $table->date('dob')->nullable(false)->change();
            $table->date('registration_date')->nullable(false)->change();
            $table->string('admission_no')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->string('parents_name')->nullable(false)->change();
            $table->string('parents_mobile')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('roll_no')->nullable(false)->change();
            $table->string('class')->nullable(false)->change();
            $table->string('section')->nullable(false)->change();
            $table->string('status')->nullable(false)->default(null)->change(); 
            $table->string('secondary_mobile')->nullable(false)->change();
            $table->string('profile_image')->nullable(false)->change();
            $table->text('address')->nullable(false)->change();

            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->date('registration_date')->nullable()->change();
            $table->string('admission_no')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('parents_name')->nullable()->change();
            $table->string('parents_mobile')->nullable()->change();
        });
    }
};
