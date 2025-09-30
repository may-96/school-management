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
        Schema::table('employees', function (Blueprint $table) {
            // Change monthly_salary to NOT NULL
            $table->decimal('monthly_salary', 10, 2)
                ->nullable(false)
                ->change();

            // Add status column
            $table->string('status')
                ->nullable()
                ->default('active')
                ->after('monthly_salary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // revert changes
            $table->decimal('monthly_salary', 10, 2)
                ->nullable()
                ->change();

            $table->dropColumn('status');
        });
    }
};
