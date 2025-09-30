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
        Schema::create('payroll_details', function (Blueprint $table) {
            $table->id();

            // Payroll relation
            $table->unsignedBigInteger('payroll_id');
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');


            // Pay type relation (Allowance / Deduction)
            $table->foreignId('pay_type_id')
                ->constrained('pay_types')
                ->cascadeOnDelete();

            // Amount
            $table->decimal('amount', 10, 2)->default(0);

            $table->timestamps();

            // Indexing for performance
            $table->index(['payroll_id', 'pay_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_details');
    }
};
