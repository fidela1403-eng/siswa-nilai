<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('homeroom_teachers', function (Blueprint $table) {
            $table->id('id_homeroom');

            // kolom relasi ke users (mengacu ke id_user di tabel users)
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                  ->references('id_user') // sesuai PK tabel users
                  ->on('users')
                  ->onDelete('cascade');

            // kolom relasi ke class_rooms
            $table->unsignedBigInteger('classroom_id');
            $table->foreign('classroom_id')
                  ->references('id')
                  ->on('class_rooms')
                  ->onDelete('cascade');

            // ➕ kolom nama wali kelas
            $table->string('nama', 100);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homeroom_teachers');
    }
};
