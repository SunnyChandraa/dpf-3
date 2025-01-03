@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Cabang DPF')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/js/tables-datatables-basic.js'])
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Cabang</h5>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('insert.cabang') }}">
                @csrf
                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Nama Cabang</label>
                    <input type="text" class="form-control" name="nama_cabang" id="nama_cabang"
                        placeholder="Masukkan Nama Cabang" required />
                </div>
                <div class="mb-6">
                    <label class="form-label" for="basic-default-company">Alamat Cabang</label>
                    <input type="text" class="form-control" name="alamat_cabang" id="alamat_cabang"
                        placeholder="Masukkan Alamat Cabang" required />
                </div>
                <div class="mb-6">
                    <label class="form-label" for="basic-default-company">No Telp Cabang</label>
                    <input type="text" class="form-control" name="no_telp_cabang" id="no_telp_cabang"
                        placeholder="Masukkan No Telp Cabang" required />
                </div>


                <button class="btn  text-white font-bold" style="background-color: #84AF28;" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h5 class="card-header">Master Cabang DPF</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="dt-multilingual table" id="dataTableCabangDpf">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Cabang</th>
                        <th>Alamat Cabang</th>
                        <th>Np Telp Cabang</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#dataTableCabangDpf').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.cabangDpf') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_cabang',
                        name: 'nama_cabang'
                    },
                    {
                        data: 'alamat_cabang',
                        name: 'alamat_cabang'
                    },
                    {
                        data: 'no_telp_cabang',
                        name: 'no_telp_cabang'
                    }
                ],
            });
        });
    </script>
@endsection
