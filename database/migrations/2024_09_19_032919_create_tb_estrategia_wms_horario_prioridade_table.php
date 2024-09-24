<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('tb_estrategia_wms_horario_prioridade', function (Blueprint $table) {
            $table->id('cd_estrategia_wms_horario_prioridade');
            $table->foreignId('cd_estrategia_wms')->constrained('tb_estrategia_wms');
            $table->string('ds_horario_inicio');
            $table->string('ds_horario_final');
            $table->integer('nr_prioridade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_estrategia_wms_horario_prioridade');
    }
};
