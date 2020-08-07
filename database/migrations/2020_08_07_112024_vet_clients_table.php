<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VetClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vetClients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idVeterinario");
            $table->foreign("idVeterinario")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idDueño");
            $table->foreign("idDueño")->references("id")->on("users")->onDelete("cascade");
            $table->string('nombreCliente');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('nombreMascota');
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
        Schema::dropIfExists('vetClients');
    }
}
