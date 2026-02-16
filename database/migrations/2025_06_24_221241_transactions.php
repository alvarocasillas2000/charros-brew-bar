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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');

            $table->string('provider')->default('openpay'); // en caso de que en el futuro agregues otro proveedor
            $table->string('payment_method'); // 'card', 'bank_account', 'store'
            $table->string('transaction_id')->unique(); // truj82... (para trazabilidad)

            $table->string('status')->default('pending'); // 'completed', 'in_progress', etc.
            $table->decimal('amount', 10, 2);
            $table->json('raw_response'); // aquí va TODO el json que recibas

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
