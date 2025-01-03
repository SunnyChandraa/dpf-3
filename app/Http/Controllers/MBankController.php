<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MBankController extends Controller
{
    public function getAllBankDataTable()
    {
        $query = DB::table('m_bank');

        // dd(DataTables::query($query)->toJson());

        return DataTables::query($query)->toJson();
    }

    public function InsertDataBank(Request $request)
    {
        DB::table('m_bank')->insert([
            'nama_bank' => $request->input('nama_bank'),
            'singkatan' => $request->input('nama_singkat_bank')
        ]);

        return view('content.pages.master.master-bank');
    }
}
