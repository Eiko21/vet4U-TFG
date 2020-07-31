<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idDueño");
            $table->foreign("idDueño")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idVeterinario");
            $table->foreign("idVeterinario")->references("id")->on("users")->onDelete("cascade");
            $table->string("nombre");
            $table->string("chip");
            $table->string("raza");
            $table->string("especie");
            $table->string("sexo");
            $table->date("nacimiento");
            $table->string("estatura");
            $table->float("peso",5,2);
            $table->boolean("esterilizacion")->default(false);
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
        Schema::dropIfExists('pets');
    }
}
