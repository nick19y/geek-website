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
        Schema::create('seasons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedTinyInteger('number');
            
            // $table->foreignId('series_id')->constrained();
            // essa linha subtiuti as duas de baixo, como o nome é series id, o Laravel deduz o nome da tabela series e faz o relacionamento
            
            $table->unsignedBigInteger('series_id');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
