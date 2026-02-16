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
        Schema::create('boletomovil_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
            $table->string('request_type')->comment('Type: "type1" or "type2"');
            $table->string('api_endpoint');
            $table->integer('event_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('card_payment', 10, 2)->nullable();
            $table->string('email')->nullable();
            $table->integer('http_status')->nullable();
            $table->boolean('successful')->default(false);
            $table->text('response_body')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletomovil_responses');
    }
};
