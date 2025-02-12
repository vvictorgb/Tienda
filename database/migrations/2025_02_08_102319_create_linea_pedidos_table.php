<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineaspedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPedido');
            $table->integer('numeroLinea');
            $table->unsignedBigInteger('idProducto');
            $table->integer('cantidad');
            $table->timestamps();


            $table->foreign('idPedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineaspedidos');
    }
}
