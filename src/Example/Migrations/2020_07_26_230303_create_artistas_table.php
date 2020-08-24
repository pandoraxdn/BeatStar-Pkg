<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistasTable extends Migration
{

    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('id_a');
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('nacionalidad',100);
            $table->boolean('activo')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('artistas');
    }
}
