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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();

            // Morph relation (employee_type + employee_id)
            $table->unsignedBigInteger('employee_id');
            $table->string('employee_type');

            // Payroll fields
            $table->decimal('monthly_salary', 10, 2)->nullable();
            $table->date('payroll_month');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->text('notes')->nullable();

            // Payment info
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('transaction_id')->nullable();

            $table->timestamps();

            // Indexes for morph
            $table->index(['employee_id', 'employee_type']);
            $table->index('payroll_month');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
