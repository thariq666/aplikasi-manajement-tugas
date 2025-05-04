@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-users mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{route('userCreate')}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
                <a href="{{route('UserExcel')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Exel
                </a>
                <a href="{{route('UserPdf')}}" class="btn btn-sm btn-danger" target="_blank">
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
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th><i class="fas fa-cog"></i>Menu</th>
                        </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary badge-pill text-center">
                                        {{ $item->email }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($item->jabatan == 'Admin')
                                        <span class="badge badge-success badge-pill text-center">
                                            {{ $item->jabatan }}
                                        </span>
                                    @else
                                        <span class="badge badge-info badge-pill text-center">
                                            {{ $item->jabatan }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_tugas == true)
                                    <span class="badge badge-success badge-pill text-center">
                                        Sudah DiTugaskan
                                    </span>
                                    @else
                                    <span class="badge badge-danger badge-pill text-center">
                                        Belum DiTugaskan
                                    </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('userEdit', $item->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('admin/user/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection