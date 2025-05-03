@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{route('user')}}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                 Kembali
            </a>
        </div>
        <form action="{{route('userStore')}}" method="post">
            @csrf
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama :
                        </label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid
                        @enderror" value="{{ old('nama') }}">
                        <small class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Email :
                        </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid
                        @enderror" value="{{ old('email') }}">
                        <small class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Password :
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid
                        @enderror">
                        <small class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Password Konfirmasi :
                        </label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid
                        @enderror">
                        <small class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jabatan :
                        </label>
                        <select name="jabatan" class="form-control @error('jabatan') is-invalid
                        @enderror">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                        <small class="text-danger">
                            @error('jabatan')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>

            </div>
        </form>
    </div>
@endsection