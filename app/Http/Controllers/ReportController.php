<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        return view('report');
    }

    public function getChartTable($date){
        $data = DB::table('absen as ab')
            ->join('siswa as sw', 'ab.id_siswa','=','sw.id')
            ->join('jadwal as jd', 'jd.id','=','ab.id_jadwal')
            ->join('guru as gr', 'jd.id_guru','=','gr.id')
            ->join('kelas as kl','kl.id','=','sw.id_kelas')
            ->join('pelajaran as pl', 'pl.id','=','jd.id_pelajaran')
            ->whereRaw('DATE_FORMAT(ab.absen_buka, "%Y-%m-%d")=?',[date('Y-m-d', $date/1000)])
            ->orderBy('absen_buka')
            ->select('ab.status','ab.absen_buka','sw.nama', 'sw.nomor_pelajar','pl.nama as pelajaran','kl.kelas','kl.jurusan','kl.pararel')
            ->get();
        $table = "
                <table class=\"table table-primary table-stripped\" id='table'>
                    <thead>
                        <tr>
                            <td>no</td>
                            <td>kelas</td>
                            <td>pelajaran</td>
                            <td>nrp</td>
                            <td>nama</td>
                            <td>status</td>
                        </tr>
                    </thead>
                    <tbody>";
        $i=1;
        foreach ($data as $val){
            $table .= "                        
                        <tr>
                            <td>$i</td>
                            <td>$val->kelas $val->jurusan $val->pararel</td>
                            <td>$val->pelajaran</td>
                            <td>$val->nomor_pelajar</td>
                            <td>$val->nama</td>
                            <td>$val->status</td>
                        </tr>";
            $i++;
        }
        $table .= "      
                    <tbody>
                </table>";
        echo $table;
    }

    public function getChartAll(){
        $data = DB::table('absen')
            ->selectRaw(
                'DAY(absen_buka), absen_buka, COUNT(*) AS total, 
                SUM(CASE WHEN (status = \'A\') THEN 1 ELSE 0 END) AS alpha,
                SUM(CASE WHEN (status = \'I\') THEN 1 ELSE 0 END) AS ijin,
                SUM(CASE WHEN (status = \'H\') THEN 1 ELSE 0 END) AS hadir')
            ->groupBy('DAY(absen_buka)')
            ->get();
        return response()->json([
            'alpha'=>[$this->getDataAlpha($data)],
            'ijin'=>[$this->getDataIjin($data)],
            'hadir'=>[$this->getDataHadir($data)],
        ]);
    }

    private function getDataAlpha($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->alpha]);
        }
        return $result;
    }

    private function getDataIjin($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->ijin]);
        }
        return $result;
    }

    private function getDataHadir($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->hadir]);
        }
        return $result;
    }
}
