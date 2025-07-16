<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Make these fields nullable (optional)
            $table->string('email')->nullable()->change();
            $table->string('department')->nullable()->change();

            // Make these fields required (remove nullable if previously nullable)
            $table->date('date_of_birth')->nullable(false)->change();
            $table->date('joining_date')->nullable(false)->change();
            $table->string('mobile_number')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Revert back changes
            $table->string('email')->nullable(false)->change();
            $table->string('department')->nullable(false)->change();

            $table->date('date_of_birth')->nullable()->change();
            $table->date('joining_date')->nullable()->change();
            $table->string('mobile_number')->nullable()->change();
        });
    }
};
