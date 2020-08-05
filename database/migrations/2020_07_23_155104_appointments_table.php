<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idDueño")->nullable()->unsigned();
            $table->foreign("idDueño")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idVeterinario");
            $table->foreign("idVeterinario")->references("id")->on("users")->onDelete("cascade");
            $table->date("fechaCita");
            $table->string("hora");
            $table->string("tipoCita")->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
