<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('business_days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->boolean('is_business_day')->default(true);
            $table->string('description')->nullable();
            $table->timestamps();
            
            $table->unique(['date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_days');
    }
};
