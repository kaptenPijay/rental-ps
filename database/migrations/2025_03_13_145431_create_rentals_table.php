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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_pemesanan");
            $table->foreignId("user_id");
            $table->longText('alamat');
            $table->enum('pilihan', ['ps-4', 'ps-5']);
            $table->integer('jumlah');
            $table->bigInteger('total');
            $table->string('order_id');
            $table->string('snap_token')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('settlement_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
