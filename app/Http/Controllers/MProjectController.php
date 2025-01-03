<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MProjectController extends Controller
{
    public function getAllProjectDataTable()
    {
        $query = DB::table('m_project');

        return DataTables::query($query)->toJson();
    }

    public function InsertDataProject(Request $request)
    {
        DB::table('m_project')->insert([
            'nama_project' => $request->input('nama_project')
        ]);

        return view('content.pages.master.master-project');
    }
}
