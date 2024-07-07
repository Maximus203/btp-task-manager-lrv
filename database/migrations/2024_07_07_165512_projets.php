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
        Schema::create('projets', function (Blueprint $table) {
            $table->id('idProjet');
            $table->string('nomProjet');
            $table->string('description');
            $table->date('dateDeDebut');
            $table->date('dateDeFin');
            $table->float('budget');
            $table->enum('statut', ['initial', 'en_cours', 'terminer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
