<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('correspondencias', function (Blueprint $table) {
            $table->id();
            $table->string('folio_entrada');
            $table->string('elabora');            
            $table->string('estatus');
            $table->date('fecha_elaboracion');
            $table->timestamp('fecha_recepcion', precision: 0);
            $table->string('asunto');
            $table->string('firma');
            $table->string('dependencia');
            $table->string('dirigido_a');
            $table->string('cargo');
            $table->string('tipo_oficio');
            $table->string('oficio_procedencia');
            $table->string('turnado_a');
            $table->string('recibe');
            $table->boolean('es_dirigido')->default(false);
            $table->boolean('con_copia')->default(false);
            $table->boolean('girado_delegacion')->default(false);
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondencias');
    }
};
