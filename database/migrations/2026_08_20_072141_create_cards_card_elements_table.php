<?php

use App\Models\Card;
use App\Models\CardElement;
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
        Schema::create('cards_card_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Card::class);
            $table->foreignIdFor(CardElement::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards_card_elements');
    }
};
