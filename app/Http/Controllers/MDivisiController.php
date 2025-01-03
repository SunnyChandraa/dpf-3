<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MDivisiController extends Controller
{
    public function getAllDivisiDataTable()
    {
        $query = DB::table('m_divisi');

        // dd(DataTables::query($query)->toJson());

        return DataTables::query($query)->toJson();
    }

    public function InsertDataDivisi(Request $request)
    {
        DB::table('m_divisi')->insert([
            'nama_divisi' => $request->input('nama_divisi')
        ]);

        return view('content.pages.master.master-divisi');
    }
}
