<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_doc', function (Blueprint $table) {
            
            $table->increments('tipo_doc_id');
            $table->string('nombre', 30)->nullable(false);
            $table->string('descripcion', 255)->nullable();
            $table->string('subdirectorio', 255)->nullable(false);
            $table->string('css', 255)->nullable();
            $table->string('imagen', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_doc');
    }
}
