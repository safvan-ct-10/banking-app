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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('from_user_id')->nullable();
            $table->bigInteger('to_user_id')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1 - Credit, 2 - Debit');
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('summary')->nullable();
            $table->decimal('balance', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
