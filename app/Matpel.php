<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    protected $table = 'matpel';
    public $incrementing = false;
    protected $primaryKey = 'id_matpel';
    protected $fillable = ['nama_matpel','status_pelajaran', 'status'];
}