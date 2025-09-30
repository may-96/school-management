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
        Schema::create('class_section_subject_teacher', function (Blueprint $table) {
            $table->id();

            // Required: Class Section
            $table->foreignId('class_section_id')
                ->constrained('class_section')
                ->onDelete('cascade');

            // Optional: Subject
            $table->foreignId('subject_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            // Required: Teacher
            $table->foreignId('teacher_id')
                ->constrained()
                ->onDelete('cascade');

            // Optional: Head Master
            $table->boolean('is_head_master')->default(false);

            $table->timestamps();

            // Unique combination: class_section + subject
            $table->unique(['class_section_id', 'subject_id'], 'unique_class_section_subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_section_subject_teacher');
    }
};
