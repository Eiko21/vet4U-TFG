<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalFiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idMascota");
            $table->foreign("idMascota")->references("id")->on("pets")->onDelete("cascade");
            $table->date("fechaVisita");
            $table->text("motivoVisita");
            $table->text("examenFisico")->nullable();
            $table->text("diagnostico")->nullable();
            $table->text("tratamiento")->nullable();
            $table->text("indicaciones")->nullable();
            $table->text("seguimiento")->nullable();
            $table->float("temperatura",5,2)->nullable();
            $table->string("pruebaRealizada")->nullable();
            $table->text("operacionRealizada")->nullable();
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
        Schema::dropIfExists('medicalFiles');
    }
}
