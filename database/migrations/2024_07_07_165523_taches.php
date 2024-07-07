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
        Schema::create('taches', function (Blueprint $table) {
            $table->id('idTache');
            $table->string('nomTache');
            $table->string('description');
            $table->date('dateLimite');
            $table->foreignId('responsable')->constrained(table: 'users', column: 'id');
            $table->foreignId('idProjet')->constrained(table: 'projets', column: 'idProjet');
            $table->enum('statut', ['initial', 'en_cours', 'terminer']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
