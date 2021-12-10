<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacions', function (Blueprint $table) {
            $table->id();
            $table->string('estado_pago',50)->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->float('costo_total',8,2)->nullable();
            $table->string('detalles',50);
            $table->string('diagnostico',50);
            $table->date('garantia');
            $table->float('costo',8,2);
            $table->string('repuesto',50);
            $table->float('costo_repuesto',8,2);
            $table->string('estado',50);
            $table->date('fecha_salida');
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
        Schema::dropIfExists('reparacions');
    }
}
