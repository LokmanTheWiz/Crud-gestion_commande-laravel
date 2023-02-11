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
        Schema::create('ligne_commande_achats', function (Blueprint $table) {
            $table->foreignId('commandeAchat_id')->constrained('commande_achats')->on('commande_achats')->onDelete('cascade');;
            $table->foreignId('produit_id')->constrained('produits')->on('produits')->onDelete('cascade');;
            $table->integer('qt');
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
        Schema::dropIfExists('ligne_commande_achats');
    }
};
