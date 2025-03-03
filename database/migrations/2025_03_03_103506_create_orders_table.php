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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('address');
            $table->date('date');
            $table->time('time');
            $table->string('email');
            $table->enum('payment_type', ['cash', 'card']);
            $table->enum('status', ['new', 'confirmed', 'completed', 'cancelled']);
            $table->text('rejection_reason')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
