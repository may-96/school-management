<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('date_of_birth')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('gender');
            $table->string('department');
            $table->string('class')->nullable();
            $table->string('education')->nullable();
            $table->string('profile_image')->nullable(); 
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
