<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Master\lelangModel;

class laplelang extends Controller
{
    //

    public function cetak(){
        $lelang = lelangModel::all();
        $pdf = PDF::loadview('admin.laporan.lp',['lelang'=>$lelang]);
        return $pdf->stream('lap');
    }   
}
