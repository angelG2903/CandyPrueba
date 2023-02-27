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
        Schema::create('orders', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            // Dato externo
            $table->bigInteger('id_user')->unsigned();
            $table->string('nombre');
            $table->string('telefono',10);
            $table->string('direccion');
            $table->string('sabor');
            $table->string('relleno');
            $table->string('rebanadas');
            $table->string('decoracion');
            $table->float('precio');
            $table->float('anticipo');
            $table->date('fechaEntrega');
            $table->time('horaEntrega');
            $table->boolean('status')->default(true)->nullable();

            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
