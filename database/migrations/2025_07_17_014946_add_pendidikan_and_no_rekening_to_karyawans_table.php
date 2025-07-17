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
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('pendidikan');
            $table->string('no_rekening');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn(['pendidikan', 'no_rekening']);
        });
    }
};
