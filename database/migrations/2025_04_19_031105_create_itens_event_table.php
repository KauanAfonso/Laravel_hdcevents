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
        Schema::create('itens_event', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Aicionando as FK
            $table->foreignId("item_id")->constrained()->onDelete('cascade');
            $table->foreignId("event_id")->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_event');
    }
};
