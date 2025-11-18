<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('berita', function (Blueprint $table) {
        $table->increments('berita_id');             // PK integer auto increment

        $table->unsignedInteger('kategori_id');      // FK ke kategori_berita

        $table->string('judul', 200);
        $table->string('slug', 200)->unique();
        $table->longText('isi_html');
        $table->string('penulis', 100)->nullable();
        $table->enum('status', ['draft', 'published'])->default('draft');
        $table->timestamp('terbit_at')->nullable();

        $table->timestamps();

        // Foreign Key
        $table->foreign('kategori_id')
              ->references('kategori_id')
              ->on('kategori_berita')
              ->onDelete('cascade');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_berita');
    }
};
