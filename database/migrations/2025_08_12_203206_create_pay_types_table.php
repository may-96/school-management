<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // 👈 don't forget this

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pay_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique(); // Required + unique
            $table->boolean('is_deductible')->nullable(); // Checkbox
            $table->timestamps();
        });

        // insert pay type with name Basic Salary
        DB::table('pay_types')->insert([
            'name' => 'Basic Salary',
            'is_deductible' => false, // or null if you prefer
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_types');
    }
};
