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
        Schema::create('sub_hak_akses', function (Blueprint $table) {
            $table->id();
            $table
                ->string('sub_hak_akses_id')
                ->references('id')
                ->on('sub_hak_akses');
            $table
                ->unsignedInteger('hak_akses_id')
                ->references('hak_akses')
                ->on('id');
            $table->string('sub_hak_akses');
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
        Schema::dropIfExists('sub_hak_akses');
    }
};
