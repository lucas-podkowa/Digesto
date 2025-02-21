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
        Schema::create('convenio', function (Blueprint $table) {
            $table->increments("convenio_id");
            $table->string('numero', 30)->nullable(false)->index();
            $table->unsignedInteger('tipo_convenio_id')->nullable(false)->index();
            $table->string('archivo', 255)->nullable(false);
            $table->text('resumen')->nullable();
            $table->mediumText('texto')->nullable();
            $table->date('fecha');
            $table->unsignedInteger('empresa_id')->nullable(false);
            $table->timestamps();

            $table->foreign('tipo_convenio_id')
                ->references('tipo_convenio_id')
                ->on('tipo_convenio')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('empresa_id')
                ->references('empresa_id')
                ->on('empresa')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->index(['numero', 'tipo_convenio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenio');
    }
};
