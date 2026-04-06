<?php
// database/migrations/xxxx_xx_xx_create_notifications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->string('category')->default('pengumuman'); // pengumuman | regulasi | kegiatan
            $table->string('category_label')->nullable();
            $table->string('cat_class')->default('gold');      // gold | info | success | warning
            $table->string('icon')->default('🔔');
            $table->string('icon_bg')->default('rgba(200,168,75,0.12)');
            $table->string('nomor')->nullable();               // nomor dokumen
            $table->date('tanggal')->nullable();               // tanggal dokumen
            $table->string('url')->nullable();                 // link dokumen/halaman terkait
            $table->boolean('is_read')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};