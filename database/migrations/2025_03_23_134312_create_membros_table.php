<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('membros', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('cpf')->unique();
        $table->date('data_nascimento');
        $table->string('email')->unique();
        $table->string('telefone');
        $table->string('logradouro');
        $table->string('cidade');
        $table->string('estado');
        $table->unsignedBigInteger('igreja_id');
        $table->foreign('igreja_id')->references('id')->on('igrejas')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membros');
    }
};
