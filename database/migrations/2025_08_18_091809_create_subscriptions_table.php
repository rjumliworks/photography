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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id');
            $table->datetime('start');
            $table->datetime('end');
            $table->unsignedTinyInteger('status_id');
            $table->foreign('status_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedInteger('photographer_id');
            $table->foreign('photographer_id')->references('id')->on('photographers')->onDelete('cascade');
            $table->unsignedTinyInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plan_pricings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
