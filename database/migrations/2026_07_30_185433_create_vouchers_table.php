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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // contoh: MAHASISWA50
            $table->enum('type', ['fixed', 'percentage']); // Diskon Rp nominal atau Persen (%)
            $table->decimal('discount_amount', 12, 2); // Nilai misal 50000 atau 50
            $table->decimal('min_spend', 12, 2)->default(0);
            $table->integer('max_uses')->nullable(); // Kuota voucher
            $table->integer('uses_count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
