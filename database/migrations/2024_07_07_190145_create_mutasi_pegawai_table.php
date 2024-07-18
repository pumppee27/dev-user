<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_pegawai', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('uppd_id')
                ->references('uppd')
                ->on('id');
            $table
                ->foreignId('pegawai_id')
                ->references('pegawai')
                ->on('id');
            $table->integer('jenis_mutasi');
            $table
                ->foreignId('uppd_tujuan')
                ->references('uppd')
                ->on('id');
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_pegawai');
    }
};
