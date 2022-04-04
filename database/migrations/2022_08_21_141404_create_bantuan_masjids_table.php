<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuanMasjidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuan_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pemberi');
            $table->string('penerima');
            $table->string('tanggal_ambil');
            $table->string('tanggal_akhir');
            $table->string('lokasi');

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
        Schema::dropIfExists('bantuan_masjids');
    }
}
