<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    protected $table = 'tahun_ajaran';
    public $incrementing = false;
    protected $primaryKey = 'id_tahun_ajaran';
    protected $fillable = ['nama_tahun_ajaran'];
}