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
        Schema::create('ce_point_de_vents', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_fr');
            $table->string('libelle_ar');
            $table->string('tel');
            $table->string('email');
            $table->string('localisation');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('provider_id')->references('id')->on('ce_providers');
            $table->foreign('ville_id')->references('id')->on('ce_villes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ce_point_de_vents');
    }
};
