<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_absen')->nullable();
            $table->string('kelas_id')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
