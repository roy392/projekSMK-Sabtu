<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    public $incrementing = false;
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa', 'nis', 'id_tahun_ajaran', 'id_matpel'];
}
