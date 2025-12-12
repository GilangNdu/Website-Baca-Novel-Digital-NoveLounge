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
        Schema::create('novels', function (Blueprint $table) {
            $table->id('id_novel'); 
            $table->string('judul', 200);
            $table->string('penulis', 150);
            $table->string('cover', 255);
            $table->string('kategori', 100);
            $table->text('sinopsis');
            $table->longText('cerita_lengkap');
            $table->integer('jumlah_dibaca')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novels');
    }
};
