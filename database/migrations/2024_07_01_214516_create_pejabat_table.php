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
        Schema::create('pejabat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uppd_id')->references('id')->on('uppd');
            $table->string('ka_uppd', length:100)->nullable();
            $table->string('nip_ka_uppd', length:20)->nullable();
            $table
                ->integer('plt_ka_uppd')
                ->length(1)
                ->nullable();
            $table->string('kasi_pkb', length:100)->nullable();
            $table->string('nip_kasi_pkb', length:20)->nullable();
            $table
                ->integer('plt_kasi_pkb')
                ->length(1)
                ->nullable();
            $table->string('bend_penerimaan', length:100)->nullable();
            $table->string('nip_bend_penerimaan', length:20)->nullable();
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
        Schema::dropIfExists('pejabat');
    }
};
