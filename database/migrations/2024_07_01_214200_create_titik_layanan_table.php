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
        Schema::dropIfExists('titik_layanan');
        Schema::create('titik_layanan', function (Blueprint $table) {
            $table->integer('lokasi_id')->primary();
            $table
                ->foreignId('uppd_id')
                ->references('id')
                ->on('uppd');
            $table
                ->foreignId('kategori_titik_layanan_id')
                ->references('id')
                ->on('kategori_titik_layanan');
            
            $table->string('nama_titik_layanan', length:100);
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
        Schema::dropIfExists('titik_layanan');
    }
};
