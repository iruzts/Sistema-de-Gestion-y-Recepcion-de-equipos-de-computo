<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRecepcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepcions', function (Blueprint $table) {
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
            $table->foreignId('cliente_id')
            ->nullable()
            ->constrained('clientes')
            ->cascadeOnUpdate()
            ->restrictDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recepcions', function (Blueprint $table) {
            $table->dropColumn('equipos_id','marca_id','color_id','cliente_id');
        });
    }
}
