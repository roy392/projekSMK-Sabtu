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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->string('tanngal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('no_ktp');
            $table->string('status_keluarga');
            $table->string('id_jabatan');
            $table->string('foto');
            $table->string('status_pegawai');
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
        Schema::dropIfExists('guru');
    }
};
