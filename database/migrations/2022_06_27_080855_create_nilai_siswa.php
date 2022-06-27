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
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('id_nilai_siswa');
            $table->string('nis');
            $table->string('id_matpel');
            $table->string('id_guru');
            $table->string('id_tahun_ajaran');
            $table->string('id_semester');
            $table->decimal('nilai_harian1');
            $table->decimal('nilai_harian2');
            $table->decimal('nilai_harian3');
            $table->decimal('nilai_tugas1');
            $table->decimal('nilai_tugas2');
            $table->decimal('nilai_uts');
            $table->decimal('nilai_uas');
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
        Schema::dropIfExists('nilai_siswa');
    }
};
