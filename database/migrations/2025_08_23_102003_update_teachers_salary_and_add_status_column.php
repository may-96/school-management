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
        Schema::table('teachers', function (Blueprint $table) {
            $table->decimal('monthly_salary', 10, 2)->nullable()->change();

            // Add status column with default 'Active'
            $table->string('status')->default('Active')->after('monthly_salary');
        });
    }

    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Revert monthly_salary back to nullable (already safe)
            $table->decimal('monthly_salary', 10, 2)->nullable()->change();
            $table->dropColumn('status');
        });
    }
};
