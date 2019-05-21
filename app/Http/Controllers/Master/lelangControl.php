<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\lelangModel;
use Yajra\DataTables\DataTables;

class lelangControl extends Controller
{
    //
    public function index(){
        return view('/admin/master/datalelang');
    }

    public function getDataLelang(){
        $lelang = lelangModel::query()
            ->select( 'idLelang', 'kdLelang', 'namaLelang', 'password', 'link', 'urlPenawaran', 'urlTeknis', 'urlKualifikasi' )
            ->orderBy( 'idLelang', 'ASC')
            ->get();
        
        return DataTables::of($lelang)
            ->addIndexColumn()
            ->addColumn('action', function ($lelang) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick=""><i class="fa fa-edit"></i><a/> 
                        <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="" ><i class="fa fa-trash"></i></a>';
            })
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'txtIdJadwal' => 'required|max:10',
            'txtIdLelang' => 'required|max:10',
            'dateJadwalPraQ' => 'required',
            'dateBatasUp' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }


    public function insert(Request $r){
        
        if ($this->isValid($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        } else {
            $jadwal = new jadwalModel;
            $jadwal->idJadwal = $r->txtIdJadwal;
            $jadwal->idLelang = $r->txtIdLelang;
            $jadwal->jadwal = $r->dateJadwalPraQ;
            $jadwal->batasUpload = $r->dateBatasUp;
            $jadwal->keterangan = $r->txtKetJadwal;
            $jadwal->save();
            return response()
                ->json([
                    'valid' => true,
                    'sukses' => $jadwal,
                ]);
        }
    }
}
