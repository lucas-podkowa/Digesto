<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {

            $table->increments('documento_id');
            $table->string('numero', 30)->nullable(false);
            $table->unsignedInteger('tipo_doc_id')->nullable(false);
            $table->string('archivo', 255)->nullable(false);
            $table->text('resumen')->nullable(); //text equivale a 65.535 caracteres
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('tipo_doc_id')->references('tipo_doc_id')->on('tipo_doc')->onDelete('restrict')->onUpdate('restrict');
            $table->index(['numero', 'tipo_doc_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}
