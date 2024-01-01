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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1);
            $table->string('name');
            $table->string('alamat');
            $table->string('no_telp');
            $table->foreignId('service_id');
            $table->foreignId('sepatu_id');
            $table->date('pick_up_date');
            $table->date('delivery_date');
            $table->integer('pajak');
            $table->integer('biaya_pengiriman');
            $table->integer('total_harga');
            $table->enum('status', ['tunggu_bayar','pengambilan', 'proses', 'pengiriman','selesai'])->default('tunggu_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
