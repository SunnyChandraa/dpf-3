<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MCabangController extends Controller
{
    public function getAllCabangDataTable()
    {
        $query = DB::table('m_cabang_dpf');

        return DataTables::query($query)->toJson();
    }

    public function InsertDataCabang(Request $request)
    {
        DB::table('m_cabang_dpf')->insert([
            'nama_cabang' => $request->input('nama_cabang'),
            'alamat_cabang' => $request->input('alamat_cabang'),
            'no_telp_cabang' => $request->input('no_telp_cabang')
        ]);

        return view('content.pages.master.master-cabang-dpf');
    }
}
