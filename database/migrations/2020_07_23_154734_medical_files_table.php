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
            $table->text("motivoVisita");
            $table->text("examenFisico");
            $table->text("diagnostico");
            $table->text("tratamiento");
            $table->text("indicaciones");
            $table->text("seguimiento");
            $table->float("temperatura",5,2);
            $table->string("pruebaRealizada");
            $table->text("operacionRealizada");
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
