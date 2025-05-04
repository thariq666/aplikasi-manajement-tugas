@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tachometer-alt mr-2"></i>
        DASHBOARD
    </h1>

    <div class="row">
        @if (auth()->user()->jabatan == 'Admin')
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 mr-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL ANGGOTA</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2 mr-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            TOTAL KADIV</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAdmin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 mr-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            TOTAL PROKER</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKaryawan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 mr-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            TOTAL DITUGASKAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTugas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth()->user()->jabatan == 'Karyawan' && auth()->user()->is_tugas)
    <div class="col-xl-6 col-md-6 mb-4 mt-4">
        <div class="card border-left-success shadow h-100 py-2 mr-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        STATUS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="badge badge-success badge-pill">
                                Di Tugaskan
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (auth()->user()->jabatan == 'Karyawan' && !auth()->user()->is_tugas)
    <div class="col-xl-6 col-md-6 mb-4 mt-4">
        <div class="card border-left-danger shadow h-100 py-2 mr-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        STATUS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="badge badge-danger badge-pill">
                                Belum Di Tugaskan
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>

@endsection