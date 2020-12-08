<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tratamiento');
            $table->date('fecha');
            $table->time('nombre');
            $table->enum('estado',['pendiente','realizada','cancelada']);
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('dentista_id')->constrained('dentistas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
