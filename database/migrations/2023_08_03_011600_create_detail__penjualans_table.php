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
        Schema::create('detail__penjualans', function (Blueprint $table) {
            $table->id();
            $table->integer('penjualan_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->double('harga_jual');
            $table->integer('jumlah');
            $table->double('sub_total');
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
        Schema::dropIfExists('detail__penjualans');
    }
};
