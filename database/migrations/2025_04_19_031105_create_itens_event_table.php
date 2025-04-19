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
        //crie somente se a tabela não existir no banco
        if(!Schema::hasTable('itens_events')){


        Schema::create('itens_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Aicionando as FK
            $table->foreignId("item_id")->constrained('itens')->onDelete('cascade');
            $table->foreignId("event_id")->constrained('events')->onDelete('cascade');
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_events');
    }
};
