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
        Schema::create('candles', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();

            $table->bigInteger('id_user')->unsigned();
            $table->integer('id_sale')->default(0)->nullable();
            $table->string('nombre');
            $table->float('precio');
            $table->string('status')->default('disponible')->nullable();

            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candles');
    }
};
