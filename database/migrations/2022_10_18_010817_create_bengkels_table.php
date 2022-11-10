<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bengkel');
            $table->string('nama_pemilik');
            $table->text('alamat');
            $table->text('keterangan')->nullable();
            $table->string('nomor_hp');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('foto_bengkel')->nullable();
            $table->boolean('terima_tubles')->default(0)->nullable();
            $table->boolean('terima_non_tubles')->default(0)->nullable();
            $table->boolean('terima_panggilan')->default(0)->nullable();
            $table->boolean('terima_mobil')->default(0)->nullable();
            $table->boolean('terima_motor')->default(0)->nullable();
            $table->boolean('terima_kendaraan_berat')->default(0)->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('bengkels');
    }
}
