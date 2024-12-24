php
Salin kode
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();  // Kolom ID (primary key)
            $table->string('title');  // Kolom untuk judul berita
            $table->text('content');  // Kolom untuk isi berita (panjang)
            $table->string('reporter');  // Kolom untuk nama wartawan
            $table->string('source');  // Kolom untuk nama narasumber
            $table->string('picture');  // Kolom untuk nama file gambar
            $table->date('post_date');  // Kolom untuk tanggal posting
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
