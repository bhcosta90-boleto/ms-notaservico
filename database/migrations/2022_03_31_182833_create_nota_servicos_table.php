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
        Schema::create('nota_servicos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('credencial', 40);
            $table->uuid('extrato_id');
            $table->uuid('cobranca_id');
            $table->unsignedDouble('valor_nota');
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
        Schema::dropIfExists('nota_servicos');
    }
};
