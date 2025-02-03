<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelimportacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excelimportacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->char('direccion');
            $table->integer('saldo');
            $table->date('fechanacimiento');
            $table->string('documento', 20);
            $table->boolean('activo');
            $table->decimal('notas', 7, 1);
            $table->longText('descripcion');
            $table->softDeletes();
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
        Schema::dropIfExists('excelimportacions');
    }
}

