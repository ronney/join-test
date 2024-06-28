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
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->unsignedBigInteger('categoria_produto_id')->nullable();
            $table->date('data_cadastro');
            $table->string('nome_produto',150);
            $table->float('valor_produto',10,2);
            $table->foreign('categoria_produto_id')->references('id_categoria_produto')->on('tb_categoria_produto');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_produto');
    }
};
