<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopcard', function (Blueprint $table) {
            $table->id();
            $table->string("idProducto");
            $table->string("nombre");
            $table->float("precio");
            $table->integer("cantidad");
            $table->string("idUnico");
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
        Schema::dropIfExists('shopcard');
    }
}
