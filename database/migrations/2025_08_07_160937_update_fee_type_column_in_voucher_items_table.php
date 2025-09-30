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
        Schema::table('voucher_items', function (Blueprint $table) {
            // Drop old string column
            $table->dropColumn('fee_type');

            // Add new foreignId referencing fee_types table
            $table->foreignId('fee_type_id')
                ->after('voucher_id')
                ->nullable() 
                ->constrained('fee_types')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('voucher_items', function (Blueprint $table) {
            $table->dropForeign(['fee_type_id']);
            $table->dropColumn('fee_type_id');

            $table->string('fee_type'); // restore original column if needed
        });
    }
};
