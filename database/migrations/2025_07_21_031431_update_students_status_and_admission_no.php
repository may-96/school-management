<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('status')->default('Active')->nullable()->change();

            $table->unique('admission_no');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('status')->default('Inactive')->nullable()->change();

            $table->dropUnique(['admission_no']);
        });
    }
};
