<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
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
                ->join('tb_lelang', 'tb_jadwal.idLelang', '=', 'tb_lelang.idLelang')
                ->select('tb_jadwal.idJadwal', 'tb_jadwal.idLelang', 'tb_jadwal.jadwal', 'tb_jadwal.batasUpload', 'tb_jadwal.keterangan', 'tb_lelang.kdLelang', 'tb_lelang.namaLelang')
                ->whereBetween('jadwal', array($start, $end))
                ->get();
        }else{
            $data = jadwalModel::query()
                ->join('tb_lelang', 'tb_jadwal.idLelang','=','tb_lelang.idLelang')
                ->select('tb_jadwal.idJadwal', 'tb_jadwal.idLelang', 'tb_jadwal.jadwal', 'tb_jadwal.batasUpload', 'tb_jadwal.keterangan', 'tb_lelang.kdLelang', 'tb_lelang.namaLelang')
                ->get();
        }
       

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function cetak(Request $r){
        $start = $r->input('awal');
        $end = $r->input('akhir');
        $periode = $start.' - '. $end;
        if ($start != null && $end != null) {
            # code...
            
            $data = jadwalModel::query()
                ->join('tb_lelang', 'tb_jadwal.idLelang', '=', 'tb_lelang.idLelang')
                ->select('tb_jadwal.idJadwal', 'tb_jadwal.idLelang', 'tb_jadwal.jadwal', 'tb_jadwal.batasUpload', 'tb_jadwal.keterangan', 'tb_lelang.kdLelang', 'tb_lelang.namaLelang')
                ->whereBetween('jadwal', array($start, $end))
                ->get();
        } else {
            $data = jadwalModel::query()
                ->join('tb_lelang', 'tb_jadwal.idLelang', '=', 'tb_lelang.idLelang')
                ->select('tb_jadwal.idJadwal', 'tb_jadwal.idLelang', 'tb_jadwal.jadwal', 'tb_jadwal.batasUpload', 'tb_jadwal.keterangan', 'tb_lelang.kdLelang', 'tb_lelang.namaLelang')
                ->get();
        }


        // $view = View('admin.pdf.lelangpdf', ['lelang' => $data]);
        // $pdf =\App::make('dompdf.wrapper');
        $pdf = PDF::loadview('admin.pdf.lelangpdf',  ['lelang' => $data, 'periode' => $periode]);
        $pdf->setPaper('A4');
        return $pdf->stream('laporan.pdf');
    }   

    public function cetak2(){
        // $pdf = PDF::loadview('admin.pdf.lelangpdf',  ['lelang' => $data]);
        // $pdf->setPaper('A3');
        // return $pdf->stream('lap');
        // return response()->json($datapdf);
    }
}
