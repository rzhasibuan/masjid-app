<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_kas', function (Blueprint $table) {
            $table->id();
            $table->string("tanggal_transaksi");
            $table->float('nominal');
            $table->string("keterangan");
            $table->string("jenis_catatan");
            $table->float('saldo');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_kas');
    }
}
