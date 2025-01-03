@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')



@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/js/tables-datatables-basic.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js'])
@endsection

@section('title', 'Task')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Task</h5>

            {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('insert.task') }}">
                @csrf
                <div class="mb-6">
                    <label class="form-label">Pilih Project</label>
                    <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                        @foreach ($dataProjects as $project)
                            <option value="{{ $project->id }}">{{ $project->nama_project }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Nama Task</label>
                    <input type="text" class="form-control" name="nama_task" id="nama_task"
                        placeholder="Masukkan Nama Task" required />
                </div>

                <div class="mb-6">
                    <label class="form-label">Pilih Priority</label>
                    <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                        <option value="LOW">Low</option>
                        <option value="MEDIUM">Medium</option>
                        <option value="HIGH">High</option>
                    </select>
                </div>


                <button class="btn  text-white font-bold" style="background-color: #84AF28;" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h5 class="card-header">Master Task</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="dt-multilingual table" id="dataTableTask">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Task</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#dataTableTask').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.task') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_task',
                        name: 'nama_task'
                    }
                ],
            });
        });
    </script>
@endsection
