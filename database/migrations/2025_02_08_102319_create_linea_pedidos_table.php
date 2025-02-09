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
            $table->id(); // ID autoincremental de la línea de pedido
            $table->unsignedBigInteger('idPedido'); // ID del pedido al que pertenece
            $table->integer('numeroLinea'); // Número de línea dentro del pedido
            $table->unsignedBigInteger('idProducto'); // ID del producto comprado
            $table->integer('cantidad'); // Cantidad comprada
            $table->timestamps();

            // Claves foráneas
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
