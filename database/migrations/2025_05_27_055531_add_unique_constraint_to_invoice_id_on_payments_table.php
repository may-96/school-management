<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add unique constraint to invoice_id column.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unique('invoice_id');
        });
    }

    /**
     * Remove the unique constraint.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique(['invoice_id']);
        });
    }
};
