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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('etat', ['Ouvert', 'En cours', 'Résolu', 'Fermé'])->default('Fermé');
            $table->enum('impact', ['Mineur', 'Majeur', 'Critique', 'Bloquant'])->default('Mineur');
            $table->enum('priorite', ['Basse', 'Normale', 'Élevée', 'Urgente', 'Immédiate'])->default('Basse');
            $table->enum('systeme', ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP']);
            $table->enum('categorie', ['demande_assistance', 'demande_evolution', 'anomalie_applicative', 'parametrage', 'autre'])->default('demande_assistance');
            $table->enum('reproductibilite', ['Toujours', 'Quelques fois', 'Aléatoire', 'Impossible à reproduire']);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tracking_code')->unique();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('screenshot_prob')->nullable(); //add stcreenshot 1 picture or should i add a table so i can add multiple pictures
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
