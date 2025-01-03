<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LovController;
use DataTables;

class MTaskController extends Controller
{
    protected $lovController;

    public function __construct(LovController $lovController)
    {
        $this->lovController = $lovController;
    }

    public function index()
    {
        $getAllProject = $this->lovController->getAllProject();

        return view('content.pages.master.master-task', [
            'dataProjects' => $getAllProject
        ]);
    }

    public function getAllTaskDataTable()
    {
        $query = DB::table('m_task');

        return DataTables::query($query)->toJson();
    }

    public function InsertDataTask(Request $request)
    {
        DB::table('m_task')->insert([
            'nama_task' => $request->input('nama_task')
        ]);

        return view('content.pages.master.master-task');
    }
}
