<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_horas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users'); //constrained recibe como parametro el nombre de la tabla
            $table->string('hora_entrada', 25)->nullable();
            $table->boolean('estado_hora_entrada')->default(1);

            $table->string('almuerzo_inicio', 25)->nullable();
            $table->boolean('estado_almuerzo_inicio')->default(1);

            $table->string('almuerzo_regreso', 25)->nullable();
            $table->boolean('estado_almuerzo_regreso')->default(1);

            $table->string('hora_salida', 25)->nullable();
            $table->boolean('estado_hora_salida')->default(1);

            $table->string('total_cumplimiento', 25)->nullable();   
            $table->timestamp('fecha_registro');        
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_horas');
    }
}
