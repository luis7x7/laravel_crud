<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_oficios', function (Blueprint $table) {
            $table->id();

            // Creacion de claves foraneas

            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('oficio_id');

            // Constraints

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('oficio_id')->references('id')->on('oficios');

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
        Schema::dropIfExists('personas_oficios');
    }
};
