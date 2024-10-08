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
        Schema::create('gateway_mercado_pago', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("company_id");
            $table->string('gateway_user_id');
            $table->string('refresh_token');
            $table->string('public_key');
            $table->string('access_token');
            $table->string('scope');
            $table->boolean('live_mode');
            $table->dateTime('expires_on');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_mercado_pago');
    }
};
