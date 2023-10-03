<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barng;
use App\Models\Produk;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class barangController extends Controller
{
    public function index(){

        $produk = Produk::all();
        try {
            $data['pengajuan'] = barng::orderBy('created_at', 'DESC')->get();
            
        return view('PengajuanBarang.index',[
            'pengajuan'=>$data['pengajuan'],
        ]);
    }catch(Exception $e){
        return 'aw error'. $e; 
    }
}
}