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
        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->foreignId("produto_id")
            ->references('id')->on('produtos')
            ->cascadeOnDelete();
            $table->foreignId("pedido_id")
            ->references('id')->on('pedidos')
            ->cascadOnDelete();
            $table->primary(['produto_id','pedido_id']);
            $table->string('quantidade');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_pedido');
    }
};
