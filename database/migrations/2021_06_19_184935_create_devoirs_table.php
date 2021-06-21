<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("Idmatiere");
            $table->unsignedBigInteger("IdFiliere");
            $table->string("Date");
            $table->string("Heure");
            $table->unsignedBigInteger("IdSalle");
            $table->unsignedBigInteger("IdEnseignant");
            $table->foreign("IdMatiere")->references("id")->on("matieres")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("IdFiliere")->references("id")->on("filieres")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("IdSalle")->references("id")->on("salles")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("IdEnseignant")->references("id")->on("enseignants")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('devoirs');
    }
}
