<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->date('registration_date');
            $table->string('admission_no');
            $table->string('roll_no');
            $table->string('class');
            $table->string('section');
            $table->string('gender');
            $table->string('status');
            $table->string('parents_name');
            $table->string('parents_mobile');
            $table->string('secondary_mobile');
            $table->string('profile_image')->nullable();
            $table->text('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
