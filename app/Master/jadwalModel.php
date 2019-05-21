<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class jadwalModel extends Model
{
    //
    protected $table = 'tb_jadwal';
    protected $fillable = ['idJadwal', 'idLelang', 'jadwal', 'batasUplaod', 'keterangan'];
    protected $primaryKey = 'idJadwal';
    public $incrementing = false;
}
