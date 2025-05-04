@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-users mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            @if ($tugas && auth()->user()->is_tugas)
            <div class="mb-1 mr-2">
                <a href="{{route('tugasPdf')}}" class="btn btn-sm btn-danger" target="_blank">
                    <i class="fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>
            @endif
        </div>
        <div class="card-body">
            @if ($tugas && auth()->user()->is_tugas)
            <div class="row">
                <div class="col-6">
                    Nama
                </div>
                <div class="col-6">
                    : {{ $tugas->user->nama }}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Email
                </div>
                <div class="col-6">
                    :
                    <span class="badge badge-primary badge-pill">
                        {{ $tugas->user->email }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Tugas
                </div>
                <div class="col-6">
                    : {{ $tugas->tugas }}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Tanggal Mulai
                </div>
                <div class="col-6">
                    :
                    <span class="badge badge-warning badge-pill">
                        {{ $tugas->tanggal_mulai }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Tanggal Selesai
                </div>
                <div class="col-6">
                    :
                    <span class="badge badge-success badge-pill">
                        {{ $tugas->tanggal_selesai }}
                    </span>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-6">
                        Status
                    </div>
                    <div class="col-6">
                        :
                        <span class="badge bg-danger text-white">Belum Ada Tugas</span>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection