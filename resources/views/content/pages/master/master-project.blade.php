@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Project')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/js/tables-datatables-basic.js'])
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Project</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('insert.project') }}">
                @csrf
                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Nama Project</label>
                    <input type="text" class="form-control" name="nama_project" id="nama_project"
                        placeholder="Masukkan Nama Project" required />
                </div>

                <button class="btn  text-white font-bold" style="background-color: #84AF28;" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h5 class="card-header">Master Project</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="dt-multilingual table" id="dataTableProject">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#dataTableProject').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.project') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_project',
                        name: 'nama_project'
                    }
                ],
            });
        });
    </script>
@endsection
