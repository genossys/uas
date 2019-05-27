<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Master\lelangModel;
use App\Master\jadwalModel;
use Yajra\DataTables\DataTables;

class laplelang extends Controller
{
    //

    public function tampil(Request $r){

        if ($r->awal != null && $r->akhir != null) {
            # code...
            $start = $r->input('awal');
            $end = $r->input('akhir');
            $data = jadwalModel::query()
                ->select('idJadwal', 'idLelang', 'jadwal', 'batasUpload', 'keterangan')
                ->whereBetween('jadwal', array($start, $end))
                ->get();
        }else{
            $data = jadwalModel::query()
                ->select('idJadwal', 'idLelang', 'jadwal', 'batasUpload', 'keterangan')
                ->get();
        }
       

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function cetak(){
        $lelang = lelangModel::all();
        $pdf = PDF::loadview('admin.pdf.lelangpdf',['lelang'=>$lelang]);
        $pdf->setPaper('A3');
        return $pdf->stream('lap');
    }   
}
