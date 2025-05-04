@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{route('tugas')}}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                 Kembali
            </a>
        </div>
        <form action="{{route('tugasUpdate',$tugas->id)}}" method="post">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-xl-12 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama :
                        </label>
                        <input type="text" value="{{ $tugas->user->nama }}" class="form-control" disabled>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tugas :
                        </label>
                        <textarea name="tugas" rows="5" class="form-control @error('tugas') is-invalid
                        @enderror" >{{ $tugas->tugas }}</textarea>
                        <small class="text-danger">
                            @error('tugas')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Mulai :
                        </label>
                        <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid
                        @enderror" value="{{ $tugas->tanggal_mulai }}">
                        <small class="text-danger">
                            @error('tanggal_mulai')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Selesai :
                        </label>
                        <input type="date" name="tanggal_selesai" class="form-control  @error('tanggal_selesai') is-invalid
                        @enderror" value="{{ $tugas->tanggal_selesai }}">
                        <small class="text-danger">
                            @error('tanggal_selesai')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>


                <button type="submit" class="btn btn-warning mt-3">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </button>

            </div>
        </form>
    </div>
@endsection