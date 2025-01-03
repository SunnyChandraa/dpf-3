@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Divisi')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/js/tables-datatables-basic.js'])
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Divisi</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('insert.divisi') }}">
                @csrf
                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Nama Divisi</label>
                    <input type="text" class="form-control" name="nama_divisi" id="nama_divisi"
                        placeholder="Masukkan Nama Divisi" required />
                </div>

                <button class="btn  text-white font-bold" style="background-color: #84AF28;" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h5 class="card-header">Master Divisi</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="dt-multilingual table" id="dataTableDivisi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Divisi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#dataTableDivisi').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.divisi') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_divisi',
                        name: 'nama_divisi'
                    }
                ],
            });
        });
    </script>
@endsection
