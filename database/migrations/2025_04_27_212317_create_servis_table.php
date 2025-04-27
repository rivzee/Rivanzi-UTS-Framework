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
    Schema::create('servis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemilik');
        $table->string('no_polisi');
        $table->string('jenis_kendaraan');
        $table->text('keluhan');
        $table->string('jenis_servis');
        $table->date('tanggal_servis');
        $table->decimal('biaya', 10, 2);
        $table->enum('status', ['menunggu', 'dikerjakan', 'selesai'])->default('menunggu');
        $table->softDeletes(); // Soft Delete
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
