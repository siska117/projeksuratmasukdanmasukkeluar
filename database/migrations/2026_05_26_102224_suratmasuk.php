<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
{
    Schema::create('surat_masuks', function (Blueprint $table) {
        $table->id();
        $table->string('no_surat');
        $table->date('tanggal_surat');
        $table->date('tanggal_terima');
        $table->string('asal_surat');
        $table->string('perihal');
        $table->enum('sifat', ['Biasa', 'Penting', 'Rahasia'])->default('Biasa');
        $table->text('keterangan')->nullable();
        $table->string('file_surat')->nullable();
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};