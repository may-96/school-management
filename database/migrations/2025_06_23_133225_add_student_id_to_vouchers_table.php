<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('vouchers', function (Blueprint $table) {
        $table->foreignId('student_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('vouchers', function (Blueprint $table) {
        $table->dropForeign(['student_id']);
        $table->dropColumn('student_id');
    });
}

};
