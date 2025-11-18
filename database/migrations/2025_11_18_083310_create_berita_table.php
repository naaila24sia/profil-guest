<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('berita_id');             // PK

            // Foreign Key ke kategori_berita
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')
                  ->references('kategori_id')
                  ->on('kategori_berita')
                  ->onDelete('cascade');

            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('isi_html');        // isi berita
            $table->string('penulis')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('terbit_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
