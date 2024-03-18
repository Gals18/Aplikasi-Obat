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
        Schema::create('obat', function (Blueprint $table) {
            $table->increments('id_obat');
            $table->string('nama_obat');
            $table->unsignedInteger('stok_obat');
            $table->unsignedInteger('harga_obat');
            $table->string('deskripsi_obat');
            $table->unsignedInteger('added_by');
            $table->foreign('added_by')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('obat');
    }
};
