<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class lelangModel extends Model
{
    //
    protected $table = 'tb_lelang';
    protected $fillable = ['idLelang','kdLelang', 'namaLelang', 'password','link', 'urlPenawaran','urlTeknis','urlKualifikasi'];
    protected $primaryKey = 'idLelang';
    public $incrementing = false;
}
