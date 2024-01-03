<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDatosTable extends Migration
{
    public function up()
    {
        Schema::create('tblDatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->integer('edad')->nullable();
            $table->string('ocupacion', 50)->nullable();
            $table->string('pasatiempo', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblDatos');
    }
}
