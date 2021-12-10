<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcions', function (Blueprint $table) {
            $table->id();
            $table->string('modelo',50)->default('Sin Modelo');
            $table->string('serie',50)->default('Sin Serie');
            $table->string('claveequipo',50)->default('Sin Contraseña');
            $table->string('problema',50);
            $table->string('estado',50);
            $table->string('observacion',50)->default('Sin Observaciones');
            $table->float('abono',8,2);
            $table->date('fechaI');
            $table->date('fechaPE');
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
        Schema::dropIfExists('recepcions');
    }
}
