<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class LovController extends Controller
{
    public function getAllProject()
    {
        $query = DB::table('m_project')->get();

        return $query;
    }
}
