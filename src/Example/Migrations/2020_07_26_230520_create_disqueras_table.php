<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisquerasTable extends Migration
{

    public function up()
    {
        Schema::create('disqueras', function (Blueprint $table) {
            $table->increments('id_d');
            $table->string('nombre',100);
            $table->string('siglas',100);
            $table->boolean('activo')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('disqueras');
    }
}
