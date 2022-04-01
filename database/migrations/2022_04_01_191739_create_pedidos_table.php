<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->decimal('valor_total', 12)->nullable();
            $table->decimal('valor_frete', 12)->nullable();
            $table->timestamp('data')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->integer('id_loja')->nullable();
            $table->integer('id_situacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
