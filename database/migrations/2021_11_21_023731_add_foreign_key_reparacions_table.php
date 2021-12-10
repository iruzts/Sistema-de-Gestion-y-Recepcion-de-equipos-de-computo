<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyReparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparacions', function (Blueprint $table) {
            $table->foreignId('tecnico_id')
            ->nullable()
            ->constrained('tecnicos')
            ->cascadeOnUpdate()
            ->restrictDelete();
            $table->foreignId('recepcion_id')
            ->nullable()
            ->constrained('recepcions')
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
        Schema::table('reparacions', function (Blueprint $table) {
            $table->dropColumn('tecnico_id','recepcion_id');
        });
    }
}
