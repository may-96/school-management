<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('class');
            $table->dropColumn('section');

            $table->unsignedBigInteger('class_section_id')->nullable()->after('roll_no');

            $table->foreign('class_section_id')
                ->references('id')
                ->on('class_section')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('class')->nullable();
            $table->string('section')->nullable();

            $table->dropForeign(['class_section_id']);
            $table->dropColumn('class_section_id');
        });
    }
};
