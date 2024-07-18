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
        Schema::create('user_samsat', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('uppd_id')
                ->references('id')
                ->on('uppd');
            $table
                ->unsignedInteger('titik_layanan_id')
                ->references('lokasi_id')
                ->on('titik_layanan');
            $table
                ->foreignId('pegawai_id')
                ->references('id')
                ->on('pegawai');
            $table->string('nama_alias', length:100);
            $table->string('password');
            $table->string('hak_akses_id')->references('id')->on('hak_akses');
            $table->string('sub_hak_akses_id')->references('id')->on('Sub_hak_akses');
            $table
                ->integer('is_active')
                ->default(0)
                ->nullable();
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
        Schema::dropIfExists('user_samsat');
    }
};
