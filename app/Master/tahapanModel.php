<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class tahapanModel extends Model
{
    //
    protected $table = 'tb_tahapan';
    protected $fillable = ['idTahapan', 'idLelang', 'batasUplaod', 'pekerjaan'];
    protected $primaryKey = 'idTahapan';
    public $incrementing = false;
}
