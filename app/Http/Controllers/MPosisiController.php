<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MPosisiController extends Controller
{
    public function getAllPosisiDataTable()
    {
        $query = DB::table('m_posisi');

        return DataTables::query($query)->toJson();
    }

    public function InsertDataPosisi(Request $request)
    {
        DB::table('m_posisi')->insert([
            'nama_posisi' => $request->input('nama_posisi')
        ]);

        return view('content.pages.master.master-posisi');
    }
}
