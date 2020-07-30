<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalFileImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalFileImages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idFicha");
            $table->foreign("idFicha")->references("id")->on("medicalFiles")->onDelete("cascade");
            $table->string("imagen")->nullable();
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
        Schema::dropIfExists('medicalFileImages');
    }
}
