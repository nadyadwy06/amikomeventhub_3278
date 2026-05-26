<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('partners', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('logo'); // untuk menyimpan path gambar
        $table->string('type');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['name', 'logo', 'type']);
        });
    }
};
