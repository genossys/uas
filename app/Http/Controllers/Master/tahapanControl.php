<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\jadwalModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class jadwalControl extends Controller
{
    //
    public function index(){
        return view('/admin/master/datatahapan');
    }

    public function getDataTahapan(){
        $tahapan = jadwalModel::query()
                ->select('idTahapan','idLelang','batasUpload')
                ->orderBy('idTahapan', 'ASC')
                ->get();
        return Datatables::of($tahapan)
            ->addIndexColumn()
            ->addColumn( 'action', function ($tahapan) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showDetail(\'' . $tahapan->idTahapan . '\',\'' . $jadwal->idLelang . '\',\'' . $jadwal->batasUpload . '\')"><i class="fa fa-edit"></i><a/>
                        <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="deleteTahapan(\''. $tahapan->idTahapan.'\')" ><i class="fa fa-trash"></i></a>';
                })
            ->make(true);


    }

    private function isValid(Request $r){
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

    private function isValidEdit(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'txtIdJadwalEdit' => 'required|max:10',
            'txtIdLelangEdit' => 'required|max:10',
            'dateJadwalPraQEdit' => 'required',
            'dateBatasUpEdit' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r){

        if ($this-> isValid($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this-> isValid($r)->errors()->all()
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

    public function update(Request $r){

        if ($this->isValidEdit($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this->isValidUpdate($r)->errors()->all()
            ]);
        } else {
            $id = $r->txtOldIdJadwalEdit;
            $data = [
                'idJadwal' => $r->txtIdJadwalEdit,
                'idLelang' => $r->txtIdLelangEdit,
                'jadwal' => $r->dateJadwalPraQEdit,
                'batasUpload' => $r->dateBatasUpEdit,
                'keterangan' => $r->txtKetJadwalEdit
            ];
            jadwalModel::query()
                ->where('idJadwal', '=', $id)
                ->update($data);
            return response()
                ->json([
                    'valid' => true,
                    'sukses' => $data,
                    'url' => 'kelas/dataKelas'
                ]);
        }
    }

    public function delete(Request $r){
        $id = $r->input('idJadwal');
        jadwalModel::destroy($id);
        return response()->json([
            'sukses' => 'Berhasil Di hapus'. $id,
            'url' => 'kelas/dataKelas'
        ]);
    }
}
