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
        Schema::create('klasifikasi_obat', function (Blueprint $table) {
            $table->increments('id_klasifikasi_obat');
            $table->unsignedInteger('id_obat');
            $table->unsignedInteger('id_klasifikasi');
            $table->unsignedInteger('added_by');
            $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade');
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
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
        Schema::dropIfExists('klasifikasi_obat');
    }
};
