@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tasks mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
                <a href="#" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Exel
                </a>
                <a href="#" class="btn btn-sm btn-danger">
                    <i class="fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th><i class="fas fa-cog"></i>Menu</th>
                        </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Tiger Nixon</td>
                            <td>Entry Data</td>
                            <td><span class="badge badge-info badge-pill">24-07-2025</span></td>
                            <td><span class="badge badge-success badge-pill">25-07-2025</span></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection