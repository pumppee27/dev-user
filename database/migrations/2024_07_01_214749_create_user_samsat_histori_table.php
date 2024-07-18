<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_samsat_histori', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedInteger('uppd_id')
                ->references('id')
                ->on('uppd')->default(0)->nullable();
            $table
                ->unsignedInteger('titik_layanan_id')
                ->references('id')
                ->on('titik_layanan')->default(0)->nullable();
            $table
                ->unsignedInteger('pegawai_id')
                ->references('id')
                ->on('pegawai')->default(0)->nullable();
            $table->string('nama_alias', length:100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_samsat_histori');
    }
};
