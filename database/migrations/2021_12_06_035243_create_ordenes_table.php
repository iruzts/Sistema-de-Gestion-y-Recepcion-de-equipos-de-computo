<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->nullable();
            $table->string('modelo',50)->default('Sin Modelo')->nullable();
            $table->string('serie',50)->default('Sin Serie')->nullable();
            $table->string('claveequipo',50)->default('Sin Contraseña')->nullable();
            $table->string('problema',50);
            $table->string('dignostico',50);
            $table->date('fecha_probable_entrega');
            $table->date('fecha_ingreso');
            $table->date('garantia');
            $table->string('estado',50);
            $table->string('repuesto',50)->nullable();
            $table->float('costo_repuesto',8,2)->nullable();
            $table->float('costo',8,2);
            $table->float('abono',8,2);
            $table->float('total',8,2);
            $table->string('estado_pago',50)->nullable();
            $table->foreignId('usuario_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->restrictDelete();
            $table->foreignId('cliente_id')
            ->nullable()
            ->constrained('clientes')
            ->cascadeOnUpdate()
            ->restrictDelete();
            $table->foreignId('equipos_id')
            ->nullable()
            ->constrained('equipos')
            ->cascadeOnUpdate()
            ->restrictDelete();
            $table->foreignId('marca_id')
            ->nullable()
            ->constrained('marcas')
            ->cascadeOnUpdate()
            ->restrictDelete();
            $table->foreignId('color_id')
            ->nullable()
            ->constrained('colors')
            ->cascadeOnUpdate()
            ->restrictDelete();
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
        Schema::dropIfExists('ordenes');
    }
}
